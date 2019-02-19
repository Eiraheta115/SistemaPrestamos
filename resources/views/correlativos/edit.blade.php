@extends('layouts.master')
@section('content')

<br>
<div class="card">
    <div class="card-header">
        <h3 class="card-title mt-3">Editar Correlativo</h3>
    </div>
    <div class="card-body">
    <form action="{{route('correlativos.update', $correlativo->id)}}" method="POST">
            @csrf
            @method('PUT')
            <strong>Resolución</strong>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Resolución</span>
                </div>
                <input type="text" name="resolucion" id="resolucion" value="{{$correlativo->resolucion}}" class="form-control" placeholder="Ingrese resolución de correlativo">
            </div>
            <strong>Prefijo</strong>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Prefijo</span>
                </div>
                <input type="text" name="prefijo" id="prefijo" value="{{$correlativo->prefijo}}" class="form-control" placeholder="Ingrese el prefijo del correlativo">
            </div>
            <strong>Mínimo</strong>
            <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">0</span>
                    </div>
                    <input type="number" step="1" min="1" name="minimo" id="minimo" value="{{$correlativo->minimo}}" class="form-control" placeholder="Ingrese el mínimo del correlativo">
            </div>
            <strong>Máximo</strong>
            <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">0</span>
                    </div>
                    <input type="number" step="1" min="1" name="maximo" id="maximo" value="{{$correlativo->maximo}}" class="form-control" placeholder="Ingrese el máximo del correlativo">
            </div>
            <strong>Fecha</strong>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Fecha</span>
                </div>
                <input type="date" name="fecha" id="fecha" value="{{$correlativo->fecha}}" class="form-control" placeholder="Ingrese la fecha">
            </div>
            <strong>Tipo Documento</strong>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Documento</span>
                </div>
                <input type="text" name="TDoc" id="TDoc" value="{{$correlativo->TDoc}}" class="form-control" placeholder="Ingrese el tipo de documento">
            </div>
            <button type="submit" class="btn btn-block btn-success">Guardar</button>
        </form>
    </div>
</div>
@endsection
