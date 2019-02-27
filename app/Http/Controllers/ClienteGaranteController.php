<?php

namespace App\Http\Controllers;

use App\clienteGarante;
use Illuminate\Http\Request;
use Session;
class ClienteGaranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = clienteGarante::paginate(10);
        return view('clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('clientes.create');
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
            'clienteNit' => 'required',
            'clienteNombre' => 'required',
            'clienteTelefono' => 'required',
            'clienteCelular' => 'required',
            'clienteEmail' => 'required',
            'clienteDireccion' => 'required'
        ]);
        $clientes = clienteGarante::create($request->all());
        Session::flash('Mensaje', 'Cliente creada exitosamente');
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\clienteGarante  $clienteGarante
     * @return \Illuminate\Http\Response
     */
    public function show(clienteGarante $clienteGarante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\clienteGarante  $clienteGarante
     * @return \Illuminate\Http\Response
     */
    public function edit(clienteGarante $clienteGarante, $id)
    {
        $clienteGarante = clienteGarante::find($id);
        return view('clientes.edit', compact('clienteGarante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\clienteGarante  $clienteGarante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, clienteGarante $clienteGarante, $id)
    {
        $clienteGarante = clienteGarante::find($id);
        $request->validate([
            'clienteDui' => 'required',
            'clienteNit' => 'required',
            'clienteNombre' => 'required',
            'clienteTelefono' => 'required',
            'clienteCelular' => 'required',
            'clienteEmail' => 'required',
            'clienteDireccion' => 'required'
        ]);
        $clienteGarante->update($request->all());
        Session::flash('Mensaje', 'Cliente editada exitosamente');
        return redirect()->route('clientes.index');
    }

    public function actualizar(Request $request, $id)
    {
        $clienteGarante = clienteGarante::find($id);
        $request->validate([
            'clienteDui' => 'required',
            'clienteNit' => 'required',
            'clienteNombre' => 'required',
            'clienteTelefono' => 'required',
            'clienteCelular' => 'required',
            'clienteEmail' => 'required',
            'clienteDireccion' => 'required'
        ]);
        $clienteGarante->update($request->all());
        Session::flash('Mensaje', 'Cliente editado exitosamente');
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\clienteGarante  $clienteGarante
     * @return \Illuminate\Http\Response
     */
    public function destroy(clienteGarante $clienteGarante)
    {
        //
    }
}
