
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
    
      <h3 class="card-title mt-3">Lista de prestamos</h3>
      
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>N°</th>
            <th>Fecha</th>
            <th>Solicitante</th>
            <th>Monto prestamo</th>
            <th>Saldo</th>
            <th>plazos</th>
            <th>intereses</th>
            <th>Ver detalle</th>
          </tr>
          </thead>
          <tbody id="myTable">
          @foreach ($prestamos as $prestamo)
          <tr>
              <td>{{$prestamo->id}}</td>
              <td>{{$prestamo->fecha}}</td>
              <td>{{$prestamo->clienteNombre}}</td>
              <td>{{$prestamo->monto}}</td>
              <td>{{$prestamo->saldo}}</td>
              <td>{{$prestamo->plazo}}</td>
              <td>{{$prestamo->interes}}</td>
              <td><a class="btn btn-primary btn-flat mt-2" href="{{route('prestamoDetalle', $prestamo->id)}}"><i class="fas fa-eye"></i></a></td>

          </tr>
          @endforeach
          </tbody>
          <tfoot>
          <tr>
              <th>N°</th>
              <th>Fecha</th>
              <th>Solicitante</th>
              <th>Monto prestamo</th>
              <th>Saldo</th>
              <th>plazos</th>
              <th>intereses</th>
              <th>Ver detalle</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <br>
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->  
  @endsection  
