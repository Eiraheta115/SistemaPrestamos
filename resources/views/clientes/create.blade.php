<link rel="stylesheet" href="../../plugins/select2/select2.min.css">
@extends('layouts.master')
@section('content')
<br>
 <!-- SELECT2 EXAMPLE -->
 <form action="{{route('clientes.store')}}" method="POST">
        @csrf
        <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Cliente</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>DUI</label>
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">DUI</span>
                                </div>
                                <input type="text" name="clienteDui" id="clienteDui" class="form-control" placeholder="Ingrese el DUI del cliente">
                            </div>
                      </div>
                      <div class="form-group">
                        <label>NIT</label>
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">NIT</span>
                                </div>
                                <input type="text" name="clienteNit" id="clienteNit" class="form-control" placeholder="Ingrese el NIT del cliente">
                            </div>
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                          <div class="form-group">
                          <label>Nombre</label>
                          <div class="input-group mb-3">
                          <div class="input-group-prepend">
                          <span class="input-group-text">Nombre</span>
                          </div>
                          <input type="text" name="clienteNombre" id="clienteNombre" class="form-control" placeholder="Ingrese el nombre del cliente">
                      </div>
                                  </div>
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                            <div class="form-group">
                            <label>Direccion</label>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text">Direccion</span>
                            </div>
                            <input type="text" name="clienteDireccion" id="clienteDireccion" class="form-control" placeholder="Ingrese la direccion del cliente">
                        </div>
                                    </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                            <div class="form-group">
                                    <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    </div>
                                    <input type="text" name="clienteEmail" id="clienteEmail" class="form-control" placeholder="Ingrese el email del cliente">
                                </div>
                                            </div>
                                </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                            <div class="form-group">
                            <label>Telefono</label>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text">Telefono</span>
                            </div>
                            <input type="text" name="clienteTelefono" id="clienteTelefono" class="form-control" placeholder="Ingrese el numero de telefono del cliente">
                        </div>
                                    </div>
                        </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                            <div class="form-group">
                            <label>Celular</label>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text">Celular</span>
                            </div>
                            <input type="text" name="clienteCelular" id="clienteCelular" class="form-control" placeholder="Ingrese el numero de celular del cliente">
                        </div>
                                    </div>
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