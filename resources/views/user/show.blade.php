@extends('layouts.master')

@section('content')
<br>
@if (Session::has('Mensaje'))
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fa fa-check"></i> ¡Atencion!</h5>{{ Session::get('Mensaje') }}
</div>
@endif
@if (Session::has('Error'))
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fa fa-check"></i> ¡Atencion!</h5>{{ Session::get('Error') }}
</div>
@endif

        <div class="card">
        <div class="card-header">
                <h3 class="card-title mt-3">Detalle de usuario</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
        <form action="{{route('userUpdate', Auth::user()->id)}}" method="POST">
         @csrf
         @method('PUT')
            <strong>Nombre de usuario</strong>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Nombre</span>
                </div>
            <input type="text" name="nombre" id="nombre" value="{{$user->name}}" class="form-control" >
            </div>
            <strong>Correo de usuario</strong>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Correo</span>
                </div>
            <input type="text" name="correo" id="correo" value="{{$user->email}}" class="form-control" >
            </div>
            <button type="submit" class="btn btn-block btn-success">Guardar</button>
            </form>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
                <h3 class="card-title mt-3">Cambio de contraseña</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
        <form action="{{route('userUpdatePass', Auth::user()->id)}}" method="POST">
         @csrf
         @method('PUT')
            <strong>Nueva contraseña</strong>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                
                    <span class="input-group-text">contraseña</span>
                </div>
            <input type="password" name="pass" id="pass" class="form-control" >
            </div>
            <strong>Confirme contraseña</strong>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">contraseña</span>
                </div>
            <input type="password" name="npass" id="npass" class="form-control" >
            </div>
            <button type="submit" id="passButton" class="btn btn-block btn-success">Guardar</button>
            </form>
        </div>
    </div>

@endsection