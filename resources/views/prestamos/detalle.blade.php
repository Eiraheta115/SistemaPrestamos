@extends('layouts.master')

@section('content')

<br>
@if (Session::has('Mensaje'))
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fa fa-check"></i> ¡Atencion!</h5>{{ Session::get('Mensaje') }}
</div>
@endif
<form action="{{route('mail', $detalle->prestamo->id)}}" method="POST">
        @csrf
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Detalle de prestamo</h3>
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
                                            <script src="/assets/js/ckeditor.js"></script>
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
                                            <script src="/assets/js/ckeditor.js"></script>
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
                        <input type="text" name="prestamoMonto" id="prestamoMonto" class="form-control prestamoMonto" value="{{$detalle->prestamo->monto}}" disabled>
                        </div>
                    </div>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <div class="form-group">
                        <label>Saldo de prestamo</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">saldo</span>
                            </div>
                        <input type="text" name="prestamoSaldo" id="prestamoSaldo" class="form-control prestamoSaldo" value="{{$detalle->prestamo->saldo}}" disabled>
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

<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Detalle de cuotas y pagos</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <ul class="nav nav-pills mb-3" id="cuotasTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="cuota-tab" data-toggle="tab" href="#cuota" role="tab" aria-controls="cuota" aria-selected="true">Cuotas $$</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pago-tab" data-toggle="tab" href="#pago" role="tab" aria-controls="pago" aria-selected="false">Pagos $$</a>
    </li>
  </ul>
  <div class="tab-content" id="cuotaspagosContent">
    <div class="tab-pane fade show active" id="cuota" role="tabpanel" aria-labelledby="home-tab">
      <div class="card-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>N°</th>
                <th>Fecha de pago</th>
                <th>Monto</th>
                <th>Saldo prestamo</th>
                <th>Interes</th>
                <th>Interes Moratorio</th>
                <th>cancelado</th>
              </tr>
              </thead>
              <tbody id="myTable">
              @foreach ($detalle->prestamo->c as $indexKey =>$cuota)

              <tr>
                  <td>{{$cuota->correlativo}}</td>
                  <td>{{$cuota->fechaPago}}</td>
                  <td>{{'$ ' . $cuota->monto}}</td>
                  <td>{{'$ ' . $cuota->saldoCuota}}</td>
                  <td>{{'$ ' . $cuota->interes}}</td>
                  <td>{{$cuota->interesMoratorio . ' %'}}</td>
                  <td>
                  @if ($cuota->cancelado==false)
                  No
                  @else
                  Sí
                  @endif
                  </td>

              </tr>
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                  <th>N°</th>
                  <th>Fecha de pago</th>
                  <th>Monto</th>
                  <th>Saldo prestamo</th>
                  <th>Interes</th>
                  <th>Interes Moratorio</th>
                  <th>cancelado</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <br>
        </div>
    </div>
    <div class="tab-pane fade " id="pago" role="tabpanel" aria-labelledby="home-tab">
      <div class="card-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>N°</th>
                <th>Codigo</th>
                <th>Saldo inicial</th>
                <th>Saldo final</th>
                <th>Mora</th>
                <th>Mora acumulada</th>
              </tr>
              </thead>
              <tbody id="myTable">
              @foreach ($detalle->pagos as $indexKey =>$pago)

              <tr>
                  <td>{{$indexKey+1}}</td>
                  <td>{{$pago->codigo}}</td>
                  <td>{{'$ ' . $pago->saldoInicial}}</td>
                  <td>{{'$ ' . $pago->saldoFinal}}</td>
                  <td>{{'$ ' . $pago->mora}}</td>
                  <td>{{'$ ' . $pago->moraAcumulada}}</td>

              </tr>
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>N°</th>
                <th>Codigo</th>
                <th>Saldo inicial</th>
                <th>Saldo final</th>
                <th>Mora</th>
                <th>Mora acumulada</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <a class="btn btn-primary btn-flat mt-2" href="{{route('createPago', $detalle->prestamo->id)}}" style="float: right;">Agregar pago</a>
          <br>
        </div>

    </div>
  </div>
        <!-- /.row -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer"></div>
    <p class="ml-3">Área de detalle de cuotas y pagos</p>
</div>
</form>
@endsection
