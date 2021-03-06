
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
      <h3 class="card-title mt-3">Lista de categorias</h3>

    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <ul class="nav nav-pills mb-3" id="categoriaTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="dinero-tab" data-toggle="tab" href="#dinero" role="tab" aria-controls="dinero" aria-selected="true">Dinero $$</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="tiempo-tab" data-toggle="tab" href="#tiempo" role="tab" aria-controls="tiempo" aria-selected="false">Tiempo 1, 2...</a>
  </li>
</ul>
<div class="tab-content" id="categoriaContent">
  <div class="tab-pane fade show active" id="dinero" role="tabpanel" aria-labelledby="home-tab">
  <div class="table-responsive">
        <table id="myTable" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Rango inicial</th>
            <th>Rango final</th>
            <th>Acciones</th>
          </tr>
          </thead>
          <tbody id="myTable">
          @foreach ($categorias->categorias as $categoria)
          <tr>
              <td>{{$categoria->id}}</td>
              <td>{{$categoria->nombre}}</td>
              <td>{{'$ ' . $categoria->rangoInicial}}</td>
              <td>{{'$ ' . $categoria->rangoFinal}}</td>
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
      </div>
      <a class="btn btn-primary btn-flat mt-2" href="{{route('categorias.create')}}" style="float: right;">Agregar categoria</a>
  </div>
  <div class="tab-pane fade" id="tiempo" role="tabpanel" aria-labelledby="profile-tab">
  <div class="table-responsive">
        <table id="myTable" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Rango inicial</th>
            <th>Rango final</th>
            <th>Acciones</th>
          </tr>
          </thead>
          <tbody id="myTable">
          @foreach ($categorias->categoriasT as $categoria)
          <tr>
              <td>{{$categoria->id}}</td>
              <td>{{$categoria->nombre}}</td>
              <td>{{$categoria->rangoInicial . 'meses'}}</td>
              <td>{{$categoria->rangoFinal . 'meses'}}</td>
              <td><a class="btn btn-primary btn-flat mt-2" href="{{route('editT', $categoria->id)}}"><i class="fas fa-edit"></i></a>
                <form action="{{route('destroyT', $categoria->id)}}" method="POST">
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
      </div>
      <a class="btn btn-primary btn-flat mt-2" href="{{route('createT')}}" style="float: right;">Agregar categoria</a>
  </div>
</div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  @endsection
