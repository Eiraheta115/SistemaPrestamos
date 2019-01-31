<?php

namespace App\Http\Controllers;

use App\prestamo;
use App\clienteGarante;
use App\cuota;
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
        $prestamos=prestamo::paginate(10);
        return view('prestamos.index', compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = clienteGarante::paginate(10);
        return view('prestamos.create', compact('clientes'));
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
            'monto' => 'required',
            'plazo' => 'required',
            'interes' => 'required',
            'interesMoratorio' => 'required',
            'fecha' => 'required'
        ]);

        $cliente= clienteGarante::where('clienteDui',$request->clienteDui)->first();
        $prestamo = new prestamo;
        $prestamo->cliente_id=$cliente->id;
        $prestamo->monto=$request->monto;
        $prestamo->saldo=$request->monto;
        $prestamo->plazo=$request->plazo;
        $prestamo->interes=$request->interes;
        $prestamo->interesMoratorio=$request->interesMoratorio;
        $prestamo->fecha=$request->fecha;
        $prestamo->save();
        $prestamo->clientes()->save($cliente);
        $prestamo->save();  
        
        //creando cuota
        $cuotas=array();
        $fee=round($request->monto/$request->plazo, 2);
        $plazos=$request->plazo;
        $nextDate = date_create_from_format("Y-m-d", (string)$request->fecha);
        for ($p=0; $p<$plazos; $p++){
            $nextDate =date_add($nextDate, date_interval_create_from_date_string('30 days'));
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
        return view('prestamos.detalle', compact('prestamo'));
    }
}
