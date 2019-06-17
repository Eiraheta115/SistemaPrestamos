<?php

namespace App\Http\Controllers;

use App\prestamo;
use App\correlativos;
use App\clienteGarante;
use App\cuota;
use App\cuotaPago;
use App\garante;
use App\pago;
use App\cuenta;
use Illuminate\Http\Request;
use Session;
use DateTime;

class PagoController extends Controller
{
    //
    public function createPago( $id){
      $correlativo=correlativos::where([
        ['activo',"=", true],
        ['TDoc', "=","Prestamos"],
      ])->first();

      $cuotas=cuota::where([
        ['prestamo_id', $id],
        ['cancelado', false],
        ])->get();

      $min=$cuotas->min('correlativo');
      $max=$cuotas->max('correlativo');
      $prestamo=prestamo::find($id);
      $prestamo->c=$cuotas;
      $prestamo->cmin=$min;
      $prestamo->cmax=$max;
      $cuentas = cuenta::all();
      $cliente=clienteGarante::find($prestamo->cliente_id);
      $garante=garante::find($prestamo->garante_id);
      $pagos=pago::where('prestamo_id', $prestamo->id)->get();
      $cuota=cuota::where([
        ['prestamo_id', $prestamo->id],
        ['cancelado', false],
        ])->orderBy('id')->first();

      $det=json_encode(['cliente'=>$cliente,'garante'=>$garante, 'prestamo'=>$prestamo, 'cuota'=>$cuota, 'cuentas'=>$cuentas, 'pagos'=>$pagos]);
      $detalle=json_decode($det);
      return view('pagos.create', compact('detalle'));
    }

    public function guardarPago(Request $request, $id){
      // its required
      //dd(floatval($request->abonoCapital[0]));

      $correlativo=correlativos::where([
        ['activo',"=", true],
        ['TDoc', "=","Prestamos"],
      ])->first();

      $cuotas=cuota::where([
        ['prestamo_id', $id],
        ['cancelado', false],
        ])->get();

      $min=$cuotas->min('correlativo');
      $max=$cuotas->max('correlativo');
      $prestamo=prestamo::find($id);
      $prestamo->c=$cuotas;
      $prestamo->cmin=$min;
      $prestamo->cmax=$max;
      $cuentas = cuenta::all();
      $cliente=clienteGarante::find($prestamo->cliente_id);
      $garante=garante::find($prestamo->garante_id);

      $cuota=cuota::where([
        ['prestamo_id', $prestamo->id],
        ['cancelado', false],
        ])->orderBy('id')->first();
      $pagos=pago::where('prestamo_id', $prestamo->id)->get();
      $det=json_encode(['cliente'=>$cliente,'garante'=>$garante, 'prestamo'=>$prestamo, 'cuota'=>$cuota, 'cuentas'=>$cuentas, 'pagos'=>$pagos]);
      $detalle=json_decode($det);
      //
      //$pagos=\DB::table('pagos')->select('codigo')->where('codigo','LIKE',"{$prestamo->codigo}%")->orderByRaw('LENGTH(codigo)')->orderByRaw('CAST (SUBSTRING("codigo",10) AS INTEGER)')->get();
      //dd($pagos);
      //validando tabla de pagos
      //dd($detalle->cuota->monto-$detalle->cuota->interes);
      $totalPago=0;
      $totalIMora=0;
      for ($i=0; $i < count($request->correlativo); $i++) {
        // Abono a capital
        if(is_null($request->abonoCapital[$i])){
          Session::flash('Error','Cuota N° '.$request->correlativo[$i].': El monto de abono de capital no puede quedar en blanco');
          return view('pagos.create', compact('detalle'));
        }

        if (floatval($request->abonoCapital[$i])<0.00 || floatval($request->abonoCapital[$i])>($detalle->cuota->monto-$detalle->cuota->interes)){
          Session::flash('Error', 'Cuota N° '.$request->correlativo[$i].': El monto de abono de capital tiene que estar en los rangos validos');
          return view('pagos.create', compact('detalle'));
        } else {
          $totalPago = $totalPago + floatval($request->abonoCapital[$i]);
        }
        //interes
        if(is_null($request->interes[$i])){
          Session::flash('Error','Cuota N° '.$request->correlativo[$i].': El monto de interes no puede quedar en blanco');
          return view('pagos.create', compact('detalle'));
        }

        if (floatval($request->interes[$i])<0.00 || floatval($request->interes[$i])>$detalle->cuota->interes){
          Session::flash('Error', 'Cuota N° '.$request->correlativo[$i].': El monto de interes tiene que estar en los rangos validos');
          return view('pagos.create', compact('detalle'));
        }else {
          $totalPago = $totalPago + floatval($request->interes[$i]);
        }
        //interes moratorio
        if(is_null($request->interesMoratorio[$i])){
          //floatval($request->interesMoratorio[$i])=0.00;
          $interesMoratorio=0.00;
        }else {
          $interesMoratorio=floatval($request->interesMoratorio[$i]);
        }
        //fecha de pago de la cuota
        $cuotaFecha=cuota::where([
          ['prestamo_id', $prestamo->id],
          ['correlativo', floatval($request->correlativo[$i])],
          ])->first();

          $fpago=strtotime($request->fecha);
          $cfpago=strtotime($cuotaFecha->fechaPago);
        if ($fpago > $cfpago) {
          if ($interesMoratorio==0.00) {
            Session::flash('Error', 'Cuota N° '.$request->correlativo[$i].': Debe pagar interes moratorio, ya que la fecha de pago esta vencida');
            return view('pagos.create', compact('detalle'));
          }
          if ($interesMoratorio < 0.00 || $interesMoratorio > $detalle->cuota->monto * $prestamo->interesMoratorio){
            Session::flash('Error', 'Cuota N° '.$correlativo[$i].': El monto de interes moratorio tiene que estar en los rangos validos');
            return view('pagos.create', compact('detalle'));
          }else {
            $totalPago = $totalPago + $interesMoratorio;
            $totalIMora=$totalIMora + $interesMoratorio;
          }
        }else {
          $totalPago = $totalPago + $interesMoratorio;
          $totalIMora=$totalIMora + $interesMoratorio;
        }
      }
      if ($totalPago != $request->monto){
        Session::flash('Error','El total a pagar del detalle no coincide con el monto recibido');
        return view('pagos.create', compact('detalle'));
      }
      //creando el pago
      $pagos=\DB::table('pagos')->select('codigo')->where('codigo','LIKE',"{$prestamo->codigo}%")->orderByRaw('LENGTH(codigo)')->orderByRaw('CAST (SUBSTRING("codigo",10) AS INTEGER)')->first();
      $pago= new pago;
      if (empty($pagos)){
      $pago->codigo=$prestamo->codigo . '1';
      }else {
      $pago->codigo=$pagos->codigo . '1';
      }
      // vinculando la cuentas
      $cuenta=cuenta::where('numeroCuenta',$request->cuenta)->first();
      $pago->prestamo_id=$id;
      $pago->cuenta_id= $cuenta->id;
      $pago->saldoInicial = $prestamo->saldo;
      $pago->montoRecibido= $request->monto;
      $pago->interes= floatval($request->interes[0]) * count($request->correlativo);
      $pago->interesMoratorio= $totalIMora;
      $pago->pagoAdicional= 0.00;
      $pago->abonoCapital=$request->monto-(floatval($request->interes[0]) * count($request->correlativo));
      $pago->saldoFinal= $prestamo->saldo - ($request->monto-(floatval($request->interes[0]) * count($request->correlativo)));
      $pago->flujoCaja= 0.00;
      $pago->saldoSinMora= 0.00;
      $pago->mora= 0.00;
      $pago->moraAcumulada= 0.00;
      $pago->save();
      //cancelando cuotas
      for ($i=0; $i < count($request->correlativo); $i++) {
        $cuotaPagar=cuota::where([
          ['prestamo_id', $prestamo->id],
          ['correlativo', floatval($request->correlativo[$i])],
          ])->first();

          if(is_null($request->interesMoratorio[$i])){
            $interesMoratorio=0.00;
          }else {
            $interesMoratorio=floatval($request->interesMoratorio[$i]);
          }
          $fpago=strtotime($request->fecha);
          $cfpago=strtotime($cuotaPagar->fechaPago);
          if ($fpago > $cfpago) {
          $totalCuota=floatval($request->abonoCapital[$i]) + floatval($request->interes[$i]) + $interesMoratorio;
          $cuotaPagar->saldoCuota=$cuotaPagar->saldoCuota + $interesMoratorio - $totalCuota;
          }else {
            $totalCuota=floatval($request->abonoCapital[$i]) + floatval($request->interes[$i]) + $interesMoratorio;
            $cuotaPagar->saldoCuota=$cuotaPagar->saldoCuota - $totalCuota;
          }

          $cuotaPagar->interes=$cuotaPagar->interes - floatval($request->interes[$i]);
          $cuotaPagar->interesMoratorio=$interesMoratorio;
          if ($cuotaPagar->saldoCuota==0.00){
            $cuotaPagar->cancelado=true;
          }
          $cuotaPagar->save();
          //llenado de tabla pivote
          $cuotaPago = new cuotaPago;
          $cuotaPago->pago_id= $pago->id;
          $cuotaPago->cuota_id = $cuotaPagar->id;
          $cuotaPago->save();
          //actualizando prestamo
          $prestamo1=prestamo::find($id);
          $prestamo1->saldo=$prestamo1->saldo - floatval($request->abonoCapital[$i]);
          $prestamo1->save();
      }

      Session::flash('Mensaje','Pago registrado');
      return view('home');

    }

    public function guardarPagoNO(Request $request, $id){
      //dd($request);
      $correlativo=correlativos::where([
        ['activo',"=", true],
        ['TDoc', "=","Prestamos"],
      ])->first();

      $prestamo=prestamo::find($id);
      $prestamo->c=$prestamo->cuotas;
      $cuentas = cuenta::all();
      $cliente=clienteGarante::find($prestamo->cliente_id);
      $garante=garante::find($prestamo->garante_id);
      $cuota=cuota::where([
        ['prestamo_id', $prestamo->id],
        ['cancelado', false],
        ])->orderBy('id')->first();
      $det=json_encode(['cliente'=>$cliente,'garante'=>$garante, 'prestamo'=>$prestamo, 'cuota'=>$cuota, 'cuentas'=>$cuentas]);
      $detalle=json_decode($det);
      //
      //dd($request);
      $request->validate([
          'correlativo' => 'required',
          'monto' => 'required',
          'abono'=>'required',
          'pagoadd' => 'required',
          'interes' => 'required',
          'interesMoratorio' => 'required',
          'cuenta' => 'required',
          'fecha' => 'required'
      ]);

      $cuota1=cuota::where([
        ['prestamo_id', $id],
        ['correlativo', $request->correlativo],
        ])->first();
      $montoT=$cuota1->monto+ $cuota1->interes+ $cuota1->interesMoratorio;
      if($request->monto>$montoT){
        Session::flash('Error', 'El monto recibido es mayor que la cantidad total a pagar en la cuota');
        return view('pagos.create', compact('detalle'));
      }
      //$pagos = pago::where('prestamo_id', $id);
      $pagos=\DB::table('pagos')->select('codigo')->where('codigo','LIKE',"{$prestamo->codigo}%")->orderByRaw('LENGTH(codigo)')->orderByRaw('CAST (SUBSTRING("codigo",10) AS INTEGER)')->get();
      //$size=$pagos->count()-1;
      $pago= new pago;
      if (empty($pagos)){
      $pago->codigo=$prestamo->codigo . '1';
    }else {
      //$Ncaracteres=strlen($prestamo->codigo);
      //$Num=(int)substr($pagos[$size]->codigo,$Ncaracteres);
      //$NextNum=$Num+1;
      //$pago->codigo=$prestamo->codigo . strval($NextNum);
      $pago->codigo=$prestamo->codigo . '1';
    }
    $cuenta=cuenta::where('numeroCuenta',$request->cuenta)->first();
    $pago->prestamo_id=$id;
    $pago->cuenta_id= $cuenta->id;
    $pago->saldoInicial = $cuota1->saldoInicial;
    $pago->montoRecibido= $request->monto;
    $pago->interes= $cuota1->interes- $request->interes;
    $pago->interesMoratorio= $cuota1->interesMoratorio- $request->interesMoratorio;
    $pago->pagoAdicional= $request->pagoadd;
    $pago->abonoCapital= $cuota1->monto -$request->abono;
    $pago->saldoFinal= $cuota1->saldoInicial + ($cuota1->interesMoratorio) + ($cuota1->interes)- $request->monto - $request->pagoadd;
    $pago->flujoCaja= - $request->monto - $request->pagoadd;
    $pago->saldoSinMora= 0.00;
    $pago->mora= 0.00;
    $pago->moraAcumulada= 0.00;

    $pago->save();

    $cuotaPago = new cuotaPago;
    $cuotaPago->pago_id= $pago->id;
    $cuotaPago->cuota_id = $cuota1->id;
    $cuotaPago->save();

    if($pago->abono==0.00 && $pago->interes==0.00 && $pago->interesMoratorio==0.00){
      $cuota1->cancelado=true;
      $cuota1->save();
    }

    Session::flash('Mensaje', 'Pago registrado correctamente');
    return view('pagos.detalle', compact('detalle'));

    }
}
