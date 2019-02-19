<?php

namespace App\Http\Controllers;

use App\garante;
use Illuminate\Http\Request;
use Session;

class GaranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $garantes = garante::paginate(10);
        return view('garantes.index',compact('garantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('garantes.create');
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
         'nombre'=>'required',
         'dui'=>'required',
         'nit'=>'required',
         'telefono'=>'required',
         'celular'=>'required',
         'email'=>'required',
         'direccion'=>'required'
         ]);   
         $garantes = garante::create($request->all());
         Session::flash('Mensaje', 'Garante creado exitosamente');
        return redirect()->route('garantes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\garante  $garante
     * @return \Illuminate\Http\Response
     */
    public function show(garante $garante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\garante  $garante
     * @return \Illuminate\Http\Response
     */
    public function edit(garante $garante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\garante  $garante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, garante $garante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\garante  $garante
     * @return \Illuminate\Http\Response
     */
    public function destroy(garante $garante)
    {
        //
    }
}
