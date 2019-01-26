
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
    <a class="btn btn-primary btn-flat mt-2" href="{{route('clientes.create')}}" style="float: right;">Agregar clientes</a>
      <h3 class="card-title mt-3">Lista de clientes</h3>
      
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>DUI</th>
            <th>Nombres</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Celular</th>
            <th>Garante</th>
            <th>Garante Email</th>
            <th>Garante Telefono</th>
            <th>Garante Celular</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($clientes as $clienteGarante)
          <tr>
              <td>{{$clienteGarante->id}}</td>
              <td>{{$clienteGarante->clienteDui}}</td>
              <td>{{$clienteGarante->clienteNombre}}</td>
              <td>{{$clienteGarante->clienteEmail}}</td>
              <td>{{$clienteGarante->clienteTelefono}}</td>
              <td>{{$clienteGarante->clienteCelular}}</td>
              <td>{{$clienteGarante->garanteNombre}}</td>
              <td>{{$clienteGarante->garanteEmail}}</td>
              <td>{{$clienteGarante->garanteTelefono}}</td>
              <td>{{$clienteGarante->garanteCelular}}</td>
          </tr>
          @endforeach
          </tbody>
          <tfoot>
          <tr>
              <th>ID</th>
              <th>DUI</th>
              <th>Nombres</th>
              <th>Email</th>
              <th>Telefono</th>
              <th>Celular</th>
              <th>Garante</th>
              <th>Garante Email</th>
              <th>Garante Telefono</th>
              <th>Garante Celular</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <br>
      {{ $clientes->links()}}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->  
  @endsection  
