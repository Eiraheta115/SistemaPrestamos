
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
    <a class="btn btn-primary btn-flat mt-2" href="{{route('correlativos.create')}}" style="float: right;">Agregar correlativo</a>
      <h3 class="card-title mt-3">Lista de correlativos</h3>
      
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="table-responsive">
        <table id="myTable" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>N°</th>
            <th>Resolución</th>
            <th>Prefijo</th>
            <th>Fecha</th>
            <th>Acciones</th>
          </tr>
          </thead>
          <tbody id="myTable">
          @foreach ($correlativos as $indexKey => $Correlativo)
          <tr>
              <td>{{$indexKey+1}}</td>
              <td>{{$Correlativo->resolucion}}</td>
              <td>{{$Correlativo->prefijo}}</td>
              <td>{{$Correlativo->fecha}}</td>
              <td><a class="btn btn-primary btn-flat mt-2" href="{{route('correlativos.edit', $Correlativo->id)}}"><i class="fas fa-edit"></i></a>
                <form action="{{route('correlativos.destroy', $Correlativo->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                <button type="submit" class="btn btn-primary btn-danger mt-2" onclick="return confirm('¿Esta seguro/a de inhabilitar el correlativo?')">
                  <i class="fas fa-ban"></i></button>
                </form>
          </tr>
            </td>
          @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>N°</th>
            <th>Resolución</th>
            <th>Prefijo</th>
            <th>Fecha</th>
            <th>Acciones</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <br>
      {{ $correlativos->links()}}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->  
  @endsection  
