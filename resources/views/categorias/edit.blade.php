@extends('layouts.master')

@section('content')
<br>
<div class="card">
        <div class="card-header">
                <h3 class="card-title mt-3">Editar categoria</h3>
        </div>
        <div class="card-body">
                <form action="{{route('categorias.update', $categoria->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <strong>Nombre de categoria</strong>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">10100</span>
                            </div>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{$categoria->nombre}}">
                        </div>
                        <strong>Rango inicial</strong>
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$0.00</span>
                                </div>
                                <input type="number" step="0.01" min="0.01" name="rangoInicial" id="rangoInicial" class="form-control" value="{{$categoria->rangoInicial}}">
                        </div>
                        <strong>Rango Final</strong>
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$0.00</span>
                                </div>
                                <input type="number" step="0.01" min="0.01" name="rangoFinal" id="rangoFinal" class="form-control" value="{{$categoria->rangoFinal}}">
                        </div>
                        <button type="submit" class="btn btn-block btn-success">Guardar</button>
                    </form>
        </div>
    </div>
@endsection