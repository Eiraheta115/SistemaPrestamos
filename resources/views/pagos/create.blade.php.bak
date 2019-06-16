@extends('layouts.master')
@section('content')

<br>
@if (Session::has('Mensaje'))
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fa fa-check"></i> ¡Atencion!</h5>{{ Session::get('Mensaje') }}
</div>
@endif
@if (Session::has('Error'))
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fa fa-alert"></i> ¡Atencion!</h5>{{ Session::get('Error') }}
</div>
@endif

<form action="{{route('mail', $detalle->prestamo->id)}}" method="POST">
        @csrf
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Detalle de pago</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>DUI cliente</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">DUI</span>
                        </div>
                        <input type="text" name="clienteDui" id="clienteDui" class="form-control dui" value="{{$detalle->cliente->clienteDui}}" disabled>
                    </div>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <div class="form-group">
                        <label>Nombre cliente</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nombre</span>
                            </div>
                            <input type="text" name="clienteNombre" id="clienteNombre" class="form-control nombre" value="{{$detalle->cliente->clienteNombre}}" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>Correo cliente</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" data-toggle="modal" data-target="#email-modal">email @ / enviar correo</span>
                            </div>
                        <input type="text" name="clienteEmail" id="clienteEmail" class="form-control clienteEmail" value="{{$detalle->cliente->clienteEmail}}"
                        data-toggle="modal" data-target="#email-modal" readonly>

                        <div class="modal fade" id="email-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Escriba el email al cliente</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body modal-lg">
                                    <!-- FORM CORREO-->

                                            <strong>Destinatario</strong>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Para</span>
                                                </div>
                                                <input type="text" name="para" id="para" class="form-control para" value="{{$detalle->cliente->clienteEmail}}" readonly>
                                            </div>
                                            <strong>Tema o asunto</strong>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Asunto</span>
                                                </div>
                                                <input type="text" name="tema" id="tema" class="form-control tema" placeholder="Ingrese el tema o asunto del correo">
                                            </div>
                                            <strong>Mensaje o cuerpo del correo</strong>
                                            <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
                                            <div class="form-group">
                                                <textarea class="form-control cuerpo" rows="16" name="cuerpo" id="editor" placeholder="Ingrese el mensaje o cuerpo del correo"></textarea>
                                            </div>
                                            <script>
                                                ClassicEditor
                                                    .create( document.querySelector( '#editor' ) )
                                                    .catch( error => {
                                                        console.error( error );
                                                    } );
                                            </script>
                                            <button type="submit" class="btn btn-block btn-success">Enviar</button>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>DUI garante</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">DUI</span>
                        </div>
                        <input type="text" name="clienteDui" id="clienteDui" class="form-control dui" value="{{$detalle->garante->dui}}" disabled>
                    </div>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <div class="form-group">
                        <label>Nombre garante</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nombre</span>
                            </div>
                            <input type="text" name="clienteNombre" id="clienteNombre" class="form-control nombre" value="{{$detalle->garante->nombre}}" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>Correo garante</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" data-toggle="modal" data-target="#email-modal-garante">email @ / enviar correo</span>
                            </div>
                        <input type="text" name="clienteEmail" id="clienteEmail" class="form-control clienteEmail" value="{{$detalle->garante->email}}"
                        data-toggle="modal" data-target="#email-modal-garante" readonly>

                        <div class="modal fade" id="email-modal-garante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Escriba el email al garante</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body modal-lg">
                                    <!-- FORM CORREO-->

                                            <strong>Destinatario</strong>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Para</span>
                                                </div>
                                                <input type="text" name="para" id="para" class="form-control para" value="{{$detalle->garante->email}}" readonly>
                                            </div>
                                            <strong>Tema o asunto</strong>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Asunto</span>
                                                </div>
                                                <input type="text" name="tema" id="tema" class="form-control tema" placeholder="Ingrese el tema o asunto del correo">
                                            </div>
                                            <strong>Mensaje o cuerpo del correo</strong>
                                            <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
                                            <div class="form-group">
                                                <textarea class="form-control cuerpo" rows="16" name="cuerpo" id="editor2" placeholder="Ingrese el mensaje o cuerpo del correo"></textarea>
                                            </div>
                                            <script>
                                                ClassicEditor
                                                    .create( document.querySelector( '#editor2' ) )
                                                    .catch( error => {
                                                        console.error( error );
                                                    } );
                                            </script>
                                            <button type="submit" class="btn btn-block btn-success">Enviar</button>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
</form>
            <div class="col-md-6 offset-sm-3 text-center">
                <!-- /.form-group -->
                <hr>
                <div class="form-group">
                    <div class="form-group">
                        <label>Codigo de prestamo</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Codigo</span>
                            </div>
                        <input type="text" name="codigo" id="codigo" class="form-control codigo" value="{{$detalle->prestamo->codigo}}" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>Monto de prestamo</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Monto</span>
                            </div>
                        <input type="text" name="prestamoMonto" id="prestamoMonto" class="form-control prestamoMonto" value="{{'$ ' . $detalle->prestamo->monto}}" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>Cuota de prestamo</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Monto</span>
                            </div>
                        <input type="text" name="cuotaMonto" id="cuotaMonto" class="form-control cuotaMonto" value="{{'$ ' . $detalle->cuota->monto}}" disabled>
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
    <p class="ml-3">Área de detalle de prestamo</p>
</div>
<form action="{{route('guardarPago', $detalle->prestamo->id)}}" method="POST">
    @csrf
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Detalle de cuotas y pagos</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
      <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label>Numero de cuota</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">1, 2, 3..</span>
                    </div>
                    <input type="text" name="correlativo" id="correlativo" class="form-control" value="{{$detalle->cuota->correlativo}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label>Monto a recibir</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$0.01</span>
                    </div>
                    <input type="number" step="0.01" min="0.00" name="monto" id="monto" class="form-control"
                        placeholder="Ingrese el monto a recibir">
                </div>
            </div>
              <div class="form-group">
                  <label>Abono a capital</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">$0.01</span>
                      </div>
                      <input type="number" step="0.01" min="0.00" name="abono" id="abono" class="form-control"
                          placeholder="Ingrese el monto para abonar">
                  </div>
              </div>
              <!-- /.form-group -->

              <!-- /.form-group -->

          </div>
          <div class="col-md-6">
            <div class="form-group">
                <div class="form-group">
                    <label>Pago adicional</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">1,2..</span>
                        </div>
                        <input type="number" step="0.01" min="0.00" name="pagoadd" id="pagoadd" class="form-control"
                            placeholder="Ingrese el monto de pago adicional">
                      </div>
                </div>
            </div>
              <div class="form-group">
                  <label>Pago de interes</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">$0.01</span>
                      </div>
                      <input type="number" step="0.01" min="0.00" name="interes" id="interes" class="form-control"
                          placeholder="Ingrese el monto para abonar">
                  </div>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                  <div class="form-group">
                      <label>Pago de interes moratorio</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text">1,2..</span>
                          </div>
                          <input type="number" step="0.01" min="0.00" name="interesMoratorio" id="interesMoratorio" class="form-control"
                              placeholder="Ingrese el monto de pago adicional">
                        </div>
                  </div>
              </div>
              <!-- /.form-group -->

          </div>
          <div class="col-md-6 offset-sm-3 text-center">
            <div class="form-group">
                <label>Cuenta bancaria</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Cuenta </span>
                    </div>
                    <input type="text" name="cuenta" id="cuenta" class="form-control cuenta" placeholder="Haga clic aqui para elegir la cuenta"
                        data-toggle="modal" data-target="#cuenta-modal" readonly>
                    <div class="modal fade" id="cuenta-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Seleccione una cuenta</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table id="clientes" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Cuenta</th>
                                                    <th>Nombre</th>
                                                    <th>Accion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($detalle->cuentas as $cuenta)
                                                <tr>
                                                    <td>{{$cuenta->id}}</td>
                                                    <td>{{$cuenta->numeroCuenta}}</td>
                                                    <td>{{$cuenta->bancoNombre}}</td>
                                                    <td><a class="btn btn-primary btn-lg ml-4" onClick="autoFill('{{$cuenta->numeroCuenta}}'); return true;">Elegir</a>
                                                </tr>

                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                  <th>ID</th>
                                                  <th>Cuenta</th>
                                                  <th>Nombre</th>
                                                  <th>Accion</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <br>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label>Fecha de pago</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">dd/mm/aaaa</span>
                        </div>
                        <input type="date" name="fecha" id="fecha" class="form-control" placeholder="Ingrese la fecha de pago de cuota">
                    </div>
                </div>
            </div>
          </div>
          <button type="submit" class="btn btn-block btn-success">Guardar</button>
      </div>
      </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer"></div>
    <p class="ml-3">Área de detalle pagos</p>
</div>
</form>
<script type="text/javascript">
    function autoFill(cuenta) {
        document.getElementById('cuenta').value = cuenta;
    }

</script>
@endsection
