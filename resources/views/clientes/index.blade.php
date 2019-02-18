
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
            <th>N°</th>
            <th>DUI</th>
            <th>NIT</th>
            <th>Nombres</th>
          </tr>
          </thead>
          <tbody id="myTable">
          @foreach ($clientes as $indexKey=>$clienteGarante)
          <tr>
              <td>{{$indexKey+1}}</td>
              <td>{{$clienteGarante->clienteDui}}</td>
              <td>{{$clienteGarante->clienteNit}}</td>
              <td>{{$clienteGarante->clienteNombre}}</td>
          </tr>
          @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>N°</th>
            <th>DUI</th>
            <th>NIT</th>
            <th>Nombres</th>
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
