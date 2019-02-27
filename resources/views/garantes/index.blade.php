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
    <a class="btn btn-primary btn-flat mt-2" href="{{route('garantes.create')}}" style="float: right;">Agregar garante</a>
      <h3 class="card-title mt-3">Lista de garantes</h3>
      
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th>DUI</th>
            <th>NIT</th>
            <th>Acciones</th>
          </tr>
          </thead>
          <tbody id="myTable">
          @foreach ($garantes as $indexKey => $garante)
          <tr>
              <td>{{$indexKey+1}}</td>  
              <td>{{$garante->nombre}}</td>
              <td>{{$garante->dui}}</td>
              <td>{{$garante->nit}}</td>
  <!--            <td>{{$garante->created_at}}</td> -->

              
              <td><a class="btn btn-primary btn-flat mt-2" href="#"><i class="fas fa-edit"></i></a>
                <form action="#" method="POST">
                  @csrf
                  @method('DELETE')
                <button type="submit" class="btn btn-primary btn-danger mt-2" onclick="#">
                  <i class="fas fa-ban"></i></button>
                </form>
          </tr>
            </td>
            
          @endforeach
          
          </tbody>
          <tfoot>
          <tr>
          <th>N°</th>
            <th>Nombre</th>
            <th>DUI</th>
            <th>NIT</th>
            <th>Acciones</th>
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
