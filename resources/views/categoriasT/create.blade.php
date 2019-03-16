@extends('layouts.master')

@section('content')
<br>
<div class="card">
        <div class="card-header">
                <h3 class="card-title mt-3">Agregar categoria</h3>
        </div>
        <div class="card-body">
                <form action="{{route('storeT')}}" method="POST">
                        @csrf
                        <strong>Nombre de categoria</strong>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">10100</span>
                            </div>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre de la categoria">
                        </div>
                        <strong>Rango inicial</strong>
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">1, 2, ...</span>
                                </div>
                                <input type="number" step="1" min="1" name="rangoInicial" id="rangoInicial" class="form-control" placeholder="Ingrese el rango inicial de la categoria">
                        </div>
                        <strong>Rango Final</strong>
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">1, 2, ...</span>
                                </div>
                                <input type="number" step="1" min="1" name="rangoFinal" id="rangoFinal" class="form-control" placeholder="Ingrese el rango final de la categoria">
                        </div>
                        <button type="submit" class="btn btn-block btn-success">Guardar</button>
                    </form>
        </div>
    </div>
@endsection