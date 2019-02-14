<?php

namespace App\Http\Controllers;

use App\correlativos;
use Illuminate\Http\Request;
use Session;
class CorrelativosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $correlativos = correlativos::where('activo', true)->paginate(10);
        return view('correlativos.index',compact('correlativos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('correlativos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        $request->validate([
            'resolucion' => 'required',
            'prefijo' => 'required',
            'minimo' => 'required',
            'maximo' => 'required',
            'fecha' => 'required',
            'TDoc' => 'required'
        ]);

        $correlativo = new correlativos;
        $correlativo->resolucion = $request->resolucion;
        $correlativo->prefijo = $request->prefijo;
        $correlativo->minimo = $request->minimo;
        $correlativo->maximo = $request->maximo;
        $correlativo->fecha = $request->fecha;
        $correlativo->activo = true;
        $correlativo->TDoc = $request->TDoc;
        $correlativo->save();

        Session::flash('Mensaje','Correlativo agregado correctamente');
        return redirect()->route('correlativos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\correlativos  $correlativo
     * @return \Illuminate\Http\Response
     */
    public function show(correlativos $correlativo)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\correlativos  $correlativo
     * @return \Illuminate\Http\Response
     */
    public function edit(correlativos $correlativo)
    {
        return view('correlativos.edit',compact('correlativo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\correlativos  $correlativo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, correlativos $correlativo)
    {
        $request->validate([
            'resolucion' => 'required',
            'prefijo' => 'required',
            'minimo' => 'required',
            'maximo' => 'required',
            'fecha' => 'required',
            'TDoc' => 'required'
        ]);

        $correlativo->resolucion = $request->resolucion;
        $correlativo->prefijo = $request->prefijo;
        $correlativo->minimo = $request->minimo;
        $correlativo->maximo = $request->maximo;
        $correlativo->fecha = $request->fecha;
        $correlativo->activo = true;
        $correlativo->TDoc = $request->TDoc;
        $correlativo->save();

        Session::flash('Mensaje','Correlativo modificado correctamente');
        return redirect()->route('correlativos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\correlativos  $correlativo
     * @return \Illuminate\Http\Response
     */
    public function destroy(correlativos $correlativo)
    {
        $correlativo->activo=false;
        $correlativo->save();
        Session::flash('Mensaje','Correlativo deshabilitado correctamente');
        return redirect()->route('correlativos.index');
    }
}
