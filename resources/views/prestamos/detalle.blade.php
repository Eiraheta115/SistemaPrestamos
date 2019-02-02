@extends('layouts.master')

@section('content')
@php
 $i=0   
@endphp
<br>
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
                        <input type="text" name="clienteDui" id="clienteDui" class="form-control dui" value="{{$prestamo->clientes['clienteDui']}}" disabled>

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
                            <input type="text" name="clienteNombre" id="clienteNombre" class="form-control nombre" value="{{$prestamo->clientes['clienteNombre']}}" disabled>
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
                            <input type="text" name="clienteTelefono" id="clienteTelefono" class="form-control telefono" value="{{$prestamo->clientes['clienteTelefono']}}" disabled>
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
                        <input type="text" name="prestamoMonto" id="prestamoMonto" class="form-control prestamoMonto" value="{{$prestamo->monto}}" disabled>
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
                        <input type="text" name="prestamoSaldo" id="prestamoSaldo" class="form-control prestamoSaldo" value="{{$prestamo->saldo}}" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>Correo del cliente</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">email @</span>
                            </div>
                        <input type="text" name="clienteEmail" id="clienteEmail" class="form-control clienteEmail" value="{{$prestamo->clientes['clienteEmail']}}" disabled>
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
                    @foreach ($prestamo->cuotas as $indexKey =>$cuota)
                    <tr>
                        <td>{{$indexKey+1}}</td>
                        <td>{{$cuota['fechaPago']}}</td>
                        <td>{{$cuota['monto']}}</td>
                        <td>{{$cuota['saldoCuota']}}</td>
                        <td>{{$cuota['interes']}}</td>
                        <td>{{$cuota['interesMoratorio']}}</td>
                        <td>
                        @if ($cuota['cancelado']==false)
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

@endsection