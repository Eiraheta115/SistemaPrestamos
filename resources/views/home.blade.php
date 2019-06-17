@extends('layouts.master')

@section('content')
<br>
@if (Session::has('Mensaje'))
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fa fa-check"></i> ¡Atencion!</h5>{{ Session::get('Mensaje') }}
</div>
@endif
<div class="card">
        <div class="card-header">
            <h3 class="card-title mt-3">Bienvenido</h3>
             <h2 class="card-title mt-3">Tu sistema de préstamos para ayudar</h2>
        </div>
        <div class="card-body">

        </div>
    </div>
@endsection
