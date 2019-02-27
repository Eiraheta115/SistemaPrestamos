@extends('layouts.master')
@section('content')
<br>
 <!-- SELECT2 EXAMPLE -->
 <form action="{{route('garantes.store')}}" method="POST">
        @csrf
        <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Agregar garante</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                        <strong>Nombre del garante</strong>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nombre</span>
                            </div>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre del garante ej. María">
                        </div>
                        <strong>DUI</strong>
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">DUI</span>
                                </div>
                                <input type="text" name="dui" id="dui" class="form-control" placeholder="Ingrese su dui">
                        </div>
                        <strong>NIT</strong>
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">NIT</span>
                                </div>
                                <input  type="text" name="nit" id="nit" class="form-control" placeholder="Ingrese su nit">
                        </div>
                        
                        <strong>Direccion</strong>
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Direccíon</span>
                                </div>
                                <input  type="text" name="direccion" id="direccion" class="form-control" placeholder="Ingrese su direccion">
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <strong>Telefono Fijo</strong>
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Telefono</span>
                                </div>
                                <input  type="text" name="telefono" id="telefono" class="form-control" placeholder="Ingrese su número de telefono fijo ej. 2233-1155">
                        </div>
                        <strong>Celular</strong>
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Celular</span>
                                </div>
                                <input  type="text" name="celular" id="celular" class="form-control" placeholder="Ingrese su número de telefono celular ej. 7288-1133">
                        </div>
                        <strong>Email</strong>
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Email</span>
                                </div>
                                <input  type="email" name="email" id="email" class="form-control" placeholder="Ingrese su correo electronico ej. ejemplo@gmail.com">
                        </div>         
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer"></div>
        
        
                
              </div>
        
        
              <button type="submit" class="btn btn-block btn-success">Guardar</button>        

</form>

@endsection