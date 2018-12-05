<link rel="stylesheet" href="../../plugins/select2/select2.min.css">
@extends('layouts.master')
@section('content')
<br>
 <!-- SELECT2 EXAMPLE -->
 <form action="{{route('prestamos.store')}}" method="POST">
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
                      <!-- /.form-group -->
                      <div class="form-group">
                          <div class="form-group">
                          <label>Nombre</label>
                          <div class="input-group mb-3">
                          <div class="input-group-prepend">
                          <span class="input-group-text">Nombre</span>
                          </div>
                          <input type="text" name="clienteNombre" id="clienteNombre" class="form-control" disabled>
                      </div>
                                  </div>
                      </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <!-- /.form-group -->
                      <div class="form-group">
                            <div class="form-group">
                            <label>Telefono</label>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text">Telefono</span>
                            </div>
                            <input type="text" name="clienteTelefono" id="clienteTelefono" class="form-control" disabled>
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
                            <input type="text" name="clienteCelular" id="clienteCelular" class="form-control" disabled>
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
                  <p class="ml-3">Esta area es para seleccionar al cliente que solicita el prestamo</p>
              </div>
        
              <div class="card card-default">
                    <div class="card-header">
                      <h3 class="card-title">Prestamo</h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Monto</label>
                            <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$0.01</span>
                                    </div>
                                    <input type="number" step="0.01" min="0.01" name="monto" id="monto" class="form-control" placeholder="Ingrese el del prestamo">
                                </div>
                          </div>
                          <!-- /.form-group -->
                          <div class="form-group">
                              <div class="form-group">
                              <label>Plazos</label>
                              <div class="input-group mb-3">
                              <div class="input-group-prepend">
                              <span class="input-group-text">1,2..</span>
                              </div>
                              <input type="text" name="plazo" id="plazo" class="form-control" placeholder="Ingrese la cantidad de plazos para el prestamo (en meses)">
                          </div>
                                      </div>
                          </div>
                          <!-- /.form-group -->
                          <div class="form-group">
                                <div class="form-group">
                                <label>Interes</label>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">%  i</span>
                                </div>
                                <input type="text" name="interes" id="interes" class="form-control" placeholder="Ingrese el porcentaje de interes mensual">
                            </div>
                                        </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                                <div class="form-group">
                                        <div class="form-group">
                                        <label>Interes moratorio</label>
                                        <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">% im<img src="" alt="" srcset=""></span>
                                        </div>
                                        <input type="text" name="interesMoratorio" id="interesMoratorio" class="form-control" placeholder="Ingrese el interes moratorio del prestamo">
                                    </div>
                                                </div>
                                    </div>
                          <!-- /.form-group -->
                          <div class="form-group">
                                <div class="form-group">
                                <label>Fecha inicio</label>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">dd/mm/aaaa</span>
                                </div>
                                <input type="date" name="fecha" id="fecha" class="form-control" placeholder="Ingrese la fecha de inicio del prestamo">
                            </div>
                                        </div>
                            </div>
                          <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer"></div>
                    <p class="ml-3">Esta area es tratar la especificacion del prestamo</p>
                  </div>
        
              <button type="submit" class="btn btn-block btn-success">Guardar</button>        

</form>

@endsection