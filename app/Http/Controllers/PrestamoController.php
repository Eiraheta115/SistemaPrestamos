<?php

namespace App\Http\Controllers;

use App\prestamo;
use App\clienteGarante;
use App\cuota;
use App\garante;
use Illuminate\Http\Request;
use Session;
use DateTime;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$prestamos=prestamo::paginate(10);
        $prestamos= \DB::table('prestamos')->select('prestamos.*', 'cliente_garantes.clienteNombre')->join('cliente_garantes','prestamos.cliente_id','=','cliente_garantes.id')->get();
        //dd($prestamos);
        return view('prestamos.index', compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = clienteGarante::all();
        $garantes = garante::all();
        $cg=json_encode(['clientes'=>$clientes,'garantes'=>$garantes]);
        $clientesGarantes=json_decode($cg);
        //dd($clientesGarantes);
        return view('prestamos.create', compact('clientesGarantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'clienteDui' => 'required',
            'clienteDuiG' => 'required',
            'monto' => 'required',
            'plazo' => 'required',
            'interes' => 'required',
            'interesMoratorio' => 'required',
            'fecha' => 'required'
        ]);

        $cliente= clienteGarante::where('clienteDui',$request->clienteDui)->first();
        $garante= garante::where('dui',$request->clienteDuiG)->first();
        //dd($garante);
        $prestamo = new prestamo;
        $prestamo->cliente_id=$cliente->id;
        $prestamo->monto=$request->monto;
        $prestamo->saldo=$request->monto;
        $prestamo->plazo=$request->plazo;
        $prestamo->interes=$request->interes;
        $prestamo->interesMoratorio=$request->interesMoratorio;
        $prestamo->fecha=$request->fecha;
        $prestamo->save();
        //$prestamo->clientes()->save($cliente);
        $cliente->prestamos()->associate($prestamo);
        $prestamo->save();
        $prestamo->garante_id=$garante->id;
        $prestamo->save(); 
        //creando cuota
        $cuotas=array();
        $fee=round($request->monto/$request->plazo, 2);
        $plazos=$request->plazo;
        $nextDate = $request->fecha;
        for ($p=0; $p<$plazos; $p++){
            $nextDate =date('Y-m-d', strtotime($nextDate. ' + 30 days'));
            $cuotas[]=[
                'prestamo_id'=>$prestamo->id,
                'fechaPago' =>$nextDate,
                'monto'=> $fee,
                'saldoCuota'=>$fee,
                'interes'=>0.00,
                'interesMoratorio'=>0.00,
                'cancelado'=>false
                
            ];
        }
        //dd($cuotas);
        $prestamo->cuotas()->createMany($cuotas);
        Session::flash('Mensaje', 'Prestamo creado exitosamente');
        return redirect()->route('prestamos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function show(prestamo $prestamo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(prestamo $prestamo)
    {
        return view('prestamos.edit', compact('prestamo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, prestamo $prestamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(prestamo $prestamo)
    {
        //
    }

    public function mostrar(Request $request, $id){
        $prestamo=prestamo::find($id);
        $prestamo->c=$prestamo->cuotas;
        $cliente=clienteGarante::find($prestamo->cliente_id);
        $garante=garante::find($prestamo->garante_id);
        $det=json_encode(['cliente'=>$cliente,'garante'=>$garante, 'prestamo'=>$prestamo]);
        $detalle=json_decode($det);
        return view('prestamos.detalle', compact('detalle'));
    }
}
