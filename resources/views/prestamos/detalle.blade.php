@extends('layouts.master')

@section('content')

<br>
@if (Session::has('Mensaje'))
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
                    <label>DUI</label>
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
                        <label>Nombre</label>
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
                        <label>Telefono</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Telefono</span>
                            </div>
                            <input type="text" name="clienteTelefono" id="clienteTelefono" class="form-control telefono" value="{{$detalle->cliente->clienteTelefono}}" disabled>
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
                <div class="form-group">
                    <div class="form-group">
                        <label>Correo del cliente</label>
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
                                <div class="modal-body">
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
                                            <div class="form-group">
                                                <textarea class="form-control cuerpo" rows="3" name="cuerpo" name="cuerpo" placeholder="Ingrese el mensaje o cuerpo del correo"></textarea>
                                            </div>
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
        <h3 class="card-title">Detalle de cuotas</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        
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
                        <td>{{$indexKey+1}}</td>
                        <td>{{$cuota->fechaPago}}</td>
                        <td>{{$cuota->monto}}</td>
                        <td>{{$cuota->saldoCuota}}</td>
                        <td>{{$cuota->interes}}</td>
                        <td>{{$cuota->interesMoratorio}}</td>
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

        <!-- /.row -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer"></div>
    <p class="ml-3">Área de detalle de cuotas</p>
</div>
</form>
@endsection