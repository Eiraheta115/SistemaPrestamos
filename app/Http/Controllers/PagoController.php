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
      return view('pagos.create', compact('detalle'));
    }

    public function guardarPago(Request $request, $id){
      //
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
