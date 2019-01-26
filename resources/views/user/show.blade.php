@extends('layouts.master')

@section('content')
<br>
<div class="card">
        <div class="card-header">
                <h3 class="card-title mt-3">Detalle de usuario</h3>
        </div>
        <div class="card-body">
            <strong>Nombre de usuario</strong>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Nombre</span>
                </div>
            <input type="text" name="nombre" id="nombre" value="{{$user->name}}" class="form-control" disabled>
            </div>
            <strong>Correo de usuario</strong>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Correo</span>
                </div>
            <input type="text" name="nombre" id="nombre" value="{{$user->email}}" class="form-control" disabled>
            </div>
        </div>
    </div>
@endsection