
@extends('layouts.master')
@section('content')
<br>
@if (Session::has('Mensaje'))
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fa fa-check"></i> ¡Atencion!</h5>{{ Session::get('Mensaje') }}
</div>
@endif
<div class="card">
    <div class="card-header">
    <a class="btn btn-primary btn-flat mt-2" href="{{route('prestamos.create')}}" style="float: right;">Registrar prestamos</a>
      <h3 class="card-title mt-3">Lista de prestamos</h3>
      
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Solicitante</th>
            <th>Monto prestamo</th>
            <th>plazo</th>
            <th>intereses</th>
            <th>Ultimo pago</th>
            <th>Estado</th>
            <th>Acciones</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($prestamos as $prestamo)
          <tr>
              <td>{{$prestamo->id}}</td>
          </tr>
          @endforeach
          </tbody>
          <tfoot>
          <tr>
              <th>ID</th>
              <th>Fecha</th>
              <th>Solicitante</th>
              <th>Monto prestamo</th>
              <th>plazo</th>
              <th>intereses</th>
              <th>Ultimo pago</th>
              <th>Estado</th>
              <th>Acciones</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <br>
      {{ $prestamos->links()}}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->  
  @endsection  
