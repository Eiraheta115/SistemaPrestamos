<?php

namespace App\Http\Controllers;

use App\categoria;
use App\categoriaT;
use Illuminate\Http\Request;
use Session;
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categorias = categoria::where('activo', true)->paginate(10);
        //return view('categorias.index',compact('categorias'));
        $categorias = categoria::where('activo', true)->get();
        $categoriasT = categoriaT::where('activo', true)->get();
        $json=json_encode(['categorias'=>$categorias,'categoriasT'=>$categoriasT]);
        $categorias=json_decode($json);
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    public function createT()
    {
        return view('categoriasT.create');
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
            'nombre' => 'required',
            'rangoInicial' => 'required',
            'rangoFinal' => 'required'
        ]);

        $categoria = new categoria;
        $categoria->nombre = $request->nombre;
        $categoria->rangoInicial =$request->rangoInicial;
        $categoria->rangoFinal =$request->rangoFinal;
        $categoria->activo = true;
        $categoria->save();

        Session::flash('Mensaje', 'Categoria creada exitosamente');
        return redirect()->route('categorias.index');
    }
    public function storeT(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'rangoInicial' => 'required',
            'rangoFinal' => 'required'
        ]);

        $categoria = new categoriaT;
        $categoria->nombre = $request->nombre;
        $categoria->rangoInicial =$request->rangoInicial;
        $categoria->rangoFinal =$request->rangoFinal;
        $categoria->activo = true;
        $categoria->save();

        Session::flash('Mensaje', 'Categoria creada exitosamente');
        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function editT(Request $request, $id)
    {
        $categoria=categoriaT::find($id);
        return view('categoriasT.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required',
            'rangoInicial' => 'required',
            'rangoFinal' => 'required'
        ]);

        $categoria->nombre = $request->nombre;
        $categoria->rangoInicial =$request->rangoInicial;
        $categoria->rangoFinal =$request->rangoFinal;
        $categoria->activo = true;
        $categoria->save();

        Session::flash('Mensaje', 'Categoria editada exitosamente');
        return redirect()->route('categorias.index');
    }

    public function updateT(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'rangoInicial' => 'required',
            'rangoFinal' => 'required'
        ]);
        $categoria=categoriaT::find($id);    
        $categoria->nombre = $request->nombre;
        $categoria->rangoInicial =$request->rangoInicial;
        $categoria->rangoFinal =$request->rangoFinal;
        $categoria->activo = true;
        $categoria->save();

        Session::flash('Mensaje', 'Categoria editada exitosamente');
        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoria $categoria)
    {
        $categoria->activo=false;
        $categoria->save();
        Session::flash('Mensaje', 'Categoria deshabilitada exitosamente');
        return redirect()->route('categorias.index');
    }

    public function destroyT(Request $request, $id)
    {
        $categoria=categoriaT::find($id);
        $categoria->activo=false;
        $categoria->save();
        Session::flash('Mensaje', 'Categoria deshabilitada exitosamente');
        return redirect()->route('categorias.index');
    }
}
