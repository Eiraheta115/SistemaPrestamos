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
<form action="{{route('prestamos.store')}}" method="POST">
    @csrf
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Cliente y Garante</h3>
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
                                <span class="input-group-text">DUI </span>
                            </div>
                            <input type="text" name="clienteDui" id="clienteDui" class="form-control dui" placeholder="Haga clic aqui para elegir al cliente"
                                data-toggle="modal" data-target="#clientes-modal" readonly>
                            <div class="modal fade" id="clientes-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Seleccione un cliente</h5>
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
                                                            <th>DUI</th>
                                                            <th>Nombres</th>
                                                            <th>Seleccionado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($clientesGarantes->clientes as $clienteGarante)
                                                        <tr>
                                                            <td>{{$clienteGarante->id}}</td>
                                                            <td>{{$clienteGarante->clienteDui}}</td>
                                                            <td>{{$clienteGarante->clienteNombre}}</td>
                                                            <td><a class="btn btn-primary btn-lg ml-4" onClick="autoFill('{{$clienteGarante->clienteDui}}','{{$clienteGarante->clienteNombre}}','{{$clienteGarante->clienteTelefono}}','{{$clienteGarante->clienteCelular}}'); return true;">Elegir</a>
                                                        </tr>

                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>DUI</th>
                                                            <th>Nombres</th>
                                                            <th>Seleccionado</th>
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
                    <!-- /.form-group -->
                    <div class="form-group">
                        <div class="form-group">
                            <label>Nombre cliente</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Nombre</span>
                                </div>
                                <input type="text" name="clienteNombre" id="clienteNombre" class="form-control nombre"
                                    disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label>Telefono cliente</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Telefono</span>
                                </div>
                                <input type="text" name="clienteTelefono" id="clienteTelefono" class="form-control telefono"
                                    disabled>
                            </div>
                        </div>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <div class="form-group">
                            <label>Celular cliente</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Celular</span>
                                </div>
                                <input type="text" name="clienteCelular" id="clienteCelular" class="form-control celular"
                                    disabled>
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
                                    <span class="input-group-text">DUI </span>
                                </div>
                                <input type="text" name="clienteDuiG" id="clienteDuiG" class="form-control dui" placeholder="Haga clic aqui para elegir al garante"
                                    data-toggle="modal" data-target="#garantes-modal" readonly>
                                <div class="modal fade" id="garantes-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Seleccione un garante</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive">
                                                    <table id="garantes" class="table table-bordered table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>DUI</th>
                                                                <th>Nombres</th>
                                                                <th>Seleccionado</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($clientesGarantes->garantes as $garante)
                                                            <tr>
                                                                <td>{{$garante->id}}</td>
                                                                <td>{{$garante->dui}}</td>
                                                                <td>{{$garante->nombre}}</td>
                                                                <td><a class="btn btn-primary btn-lg ml-4" onClick="autoFillGarante('{{$garante->dui}}','{{$garante->nombre}}','{{$garante->telefono}}','{{$garante->celular}}'); return true;">Elegir</a>
                                                            </tr>

                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>DUI</th>
                                                                <th>Nombres</th>
                                                                <th>Seleccionado</th>
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
                        <!-- /.form-group -->
                        <div class="form-group">
                            <div class="form-group">
                                <label>Nombre garante</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Nombre</span>
                                    </div>
                                    <input type="text" name="clienteNombreG" id="clienteNombreG" class="form-control nombre"
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Telefono garante</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Telefono</span>
                                    </div>
                                    <input type="text" name="clienteTelefonoG" id="clienteTelefonoG" class="form-control telefono"
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <div class="form-group">
                                <label>Celular garante</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Celular</span>
                                    </div>
                                    <input type="text" name="clienteCelularG" id="clienteCelularG" class="form-control celular"
                                        disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->

                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer"></div>
        <p class="ml-3">Esta area es para seleccionar al cliente y garante para la creación del prestamo</p>
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
                      <label>Codigo de prestamo</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text">0131</span>
                          </div>
                          <input type="text" value="{{$clientesGarantes->correlativo}}" name="codigo" id="codigo" class="form-control">
                      </div>
                  </div>
                    <div class="form-group">
                        <label>Monto</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$0.01</span>
                            </div>
                            <input type="number" step="0.01" min="0.01" name="monto" id="monto" class="form-control"
                                placeholder="Ingrese el del prestamo">
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

                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                      <div class="form-group">
                          <label>Interes</label>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">% i</span>
                              </div>
                              <input type="text" name="interes" id="interes" class="form-control" placeholder="Ingrese el porcentaje de interes mensual">
                          </div>
                      </div>
                  </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label>Interes moratorio</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">% im<img src="" alt="" srcset=""></span>
                                </div>
                                <input type="text" name="interesMoratorio" id="interesMoratorio" class="form-control"
                                    placeholder="Ingrese el interes moratorio del prestamo">
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
            <div class="form-group">
              <div class="form-group">
                  <label>Calcular</label>
                  <div class="input-group mb-3">
                    <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#pagos-modal"
                    onclick="calcularpagos(document.getElementById('fecha'),document.getElementById('interesMoratorio'),document.getElementById('interes'), document.getElementById('plazo'),document.getElementById('monto')); return true;">Calcular</button>
                    <div class="modal fade" id="pagos-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Listado de cuotas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table id="pagos" class="table table-bordered table-striped table-hover">
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
          </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer"></div>
        <p class="ml-3">Esta area es tratar la especificacion del prestamo</p>
    </div>

    <button type="submit" class="btn btn-block btn-success">Guardar</button>

</form>
<script type="text/javascript">
    function autoFill(dui, nombre, telefono, celular) {
        document.getElementById('clienteDui').value = dui;
        document.getElementById('clienteNombre').value = nombre;
        document.getElementById('clienteTelefono').value = telefono;
        document.getElementById('clienteCelular').value = celular;
    }

</script>
<script type="text/javascript">
    function autoFillGarante(dui, nombre, telefono, celular) {
        document.getElementById('clienteDuiG').value = dui;
        document.getElementById('clienteNombreG').value = nombre;
        document.getElementById('clienteTelefonoG').value = telefono;
        document.getElementById('clienteCelularG').value = celular;
    }

</script>
<script type="text/javascript">
  function calcularpagos(fecha, imoratorio, i, plazos, monto){
    //Convirtiendo los paramentros
    console.log(fecha.value);
    fechaInicio= new Date(fecha.value);
    interesMoratorio= parseFloat(imoratorio.value);
    interes=parseFloat(i.value);
    plazoPrestamo=parseInt(plazos.value);
    montoPrestamo=parseFloat(monto.value);
    cuota=Math.round((montoPrestamo/plazoPrestamo)*100)/100;
    //creando la matriz de pagos
    var pagos = new Array(plazoPrestamo);
    for (var c=0; c<pagos.length; c++){
      pagos[c]= new Array(5);
    }
    //correlativo
    x=1;
    sigCuota= new Date(fechaInicio);
    sigCuota.setDate(sigCuota.getDate()+30);
    for (p in pagos){
      pagos[p]=[x,sigCuota.getDate()+'/'+("0" + (sigCuota.getMonth() + 1)).slice(-2)+'/'+sigCuota.getFullYear(),'$'+cuota,interes,interesMoratorio,"No"];
      sigCuota.setDate(sigCuota.getDate()+30);
      x=x+1;
    }
    console.log(pagos);
    //limpiar tabla
    var tableRef = document.getElementById('pagos');
    while ( tableRef.rows.length > 0 )
    {
      tableRef.deleteRow(0);
      tableRef.deleteTHead();
    }
    //Creando encabezado de tabla
    var orderArrayHeader = ["N° Cuota","Fecha","Monto","Interes","Interes moratorio", "Pagado"];
    var thead = document.createElement('thead');
    //llenando la tabla de pagos
    table = document.getElementById("pagos");
    table.appendChild(thead);
    for(var i=0;i<orderArrayHeader.length;i++){
        thead.appendChild(document.createElement("th")).
        appendChild(document.createTextNode(orderArrayHeader[i]));
    }
    for (var k=0; k<pagos.length; k++){
      //creando la fila
      var newRow = table.insertRow(table.length);
      for (var j=0; j<pagos[k].length; j++){
        //creando la celda
        var cell = newRow.insertCell(j);
        //agregando el valor a la celda
        cell.innerHTML = pagos[k][j];
      }
    }
  }
</script>

@endsection
