<?php

namespace App\Http\Controllers;

use App\cuenta;
use Illuminate\Http\Request;
use Session;
class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentas = cuenta::where('activo', true)->paginate(10);
        return view('cuentas.index',compact('cuentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cuentas.create');
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
            'numeroCuenta' => 'required',
            'bancoNombre' => 'required',
            'saldoInicial' => 'required',
            'descripcion' => 'required'
        ]);

        $cuenta = new cuenta;
        $cuenta->numeroCuenta = $request->numeroCuenta;
        $cuenta->bancoNombre =$request->bancoNombre;
        $cuenta->saldoInicial =$request->saldoInicial;
        $cuenta->descripcion =$request->descripcion;
        $cuenta->activo = true;
        $cuenta->save();

        Session::flash('Mensaje', 'Cuenta creada exitosamente');
        return redirect()->route('cuentas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function show(cuenta $cuenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(cuenta $cuenta)
    {
        
        return view('cuentas.edit', compact('cuenta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cuenta $cuenta)
    {
        $request->validate([
            'numeroCuenta' => 'required',
            'bancoNombre' => 'required',
            'saldoInicial' => 'required',
            'descripcion' => 'required'
        ]);
        $cuenta->numeroCuenta = $request->numeroCuenta;
        $cuenta->bancoNombre =$request->bancoNombre;
        $cuenta->saldoInicial =$request->saldoInicial;
        $cuenta->descripcion =$request->descripcion;
        $cuenta->activo = true;
        $cuenta->save();

        Session::flash('Mensaje', 'Cuenta editada exitosamente');
        return redirect()->route('cuentas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(cuenta $cuenta)
    {
        $cuenta->activo=false;
        $cuenta->save();
        Session::flash('Mensaje', 'Cuenta deshabilitada exitosamente');
        return redirect()->route('cuentas.index');
    }
}
