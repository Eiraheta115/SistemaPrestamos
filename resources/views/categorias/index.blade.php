
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
    <a class="btn btn-primary btn-flat mt-2" href="{{route('categorias.create')}}" style="float: right;">Agregar categorias</a>
      <h3 class="card-title mt-3">Lista de categorias</h3>
      
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Rango inicial</th>
          <th>Rango final</th>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categorias as $categoria)
        <tr>
            <td>{{$categoria->id}}</td>
            <td>{{$categoria->nombre}}</td>
            <td>{{$categoria->rangoInicial}}</td>
            <td>{{$categoria->rangoFinal}}</td>
            <td><a class="btn btn-primary btn-flat mt-2" href="{{route('categorias.edit', $categoria->id)}}"><i class="fas fa-edit"></i></a>
              <form action="{{route('categorias.destroy', $categoria->id)}}" method="POST">
                @csrf
                @method('DELETE')
              <button type="submit" class="btn btn-primary btn-danger mt-2" onclick="return confirm('¿Esta seguro/a de inhabilitar la categoria?')">
                <i class="fas fa-ban"></i></button>
              </form>
        </tr>
          </td>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Rango inicial</th>
                <th>Rango final</th>
                <th>Acciones</th>
        </tr>
        </tfoot>
      </table>
      <br>
      {{ $categorias->links()}}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->  
  @endsection  
