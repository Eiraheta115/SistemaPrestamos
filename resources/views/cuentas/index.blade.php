
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
    <a class="btn btn-primary btn-flat mt-2" href="{{route('cuentas.create')}}" style="float: right;">Agregar cuentas</a>
      <h3 class="card-title mt-3">Lista de cuentas</h3>
      
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>N° Cuenta</th>
            <th>Banco</th>
            <th>Fecha apertura</th>
            <th>Acciones</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($cuentas as $Cuenta)
          <tr>
              <td>{{$Cuenta->id}}</td>
              <td>{{$Cuenta->numeroCuenta}}</td>
              <td>{{$Cuenta->bancoNombre}}</td>
              <td>{{$Cuenta->created_at}}</td>
              <td><a class="btn btn-primary btn-flat mt-2" href="{{route('cuentas.edit', $Cuenta->id)}}"><i class="fas fa-edit"></i></a>
                <form action="{{route('cuentas.destroy', $Cuenta->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                <button type="submit" class="btn btn-primary btn-danger mt-2" onclick="return confirm('¿Esta seguro/a de inhabilitar la cuenta bancaria?')">
                  <i class="fas fa-ban"></i></button>
                </form>
          </tr>
            </td>
          @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>ID</th>
            <th>N° Cuenta</th>
            <th>Banco</th>
            <th>Fecha apertura</th>
            <th>Acciones</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <br>
      {{ $cuentas->links()}}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->  
  @endsection  
