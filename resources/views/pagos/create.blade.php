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
          </div>
          <div class="col-md-6">
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
          <div class="col-md-10 offset-sm-1 text-center">
            <div class="table-responsive">
						<table class="table table-striped" id="dynamic_field" name="pagoCuotas">
              <h2>Tabla de pagos de cuotas</h2>
              <br>
              <button type="button" name="add" id="add" class="btn btn-success" style="margin: 10px">Agregar cuota</button>
              <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Quitar cuota</button>
              <br><br>
                <thead>
                    <tr>
                        <th>correlativo</th>
                        <th>Abono a capital</th>
                        <th>interes</th>
                        <th>interes moratorio</th>

                    </tr>
                </thead>
                <tr>
                  <td><input type="text" name="correlativo[]" style="width: 50px;" value="{{$detalle->prestamo->c["0"]->correlativo}}" class="form-control name_list " readonly/></td>
  								<td><input type="text" name="abonoCapital[]" placeholder="{{$detalle->prestamo->c["0"]->monto - $detalle->prestamo->c["0"]->interes}}" class="form-control name_list" /></td>
                  <td><input type="text" name="interes[]" placeholder="{{$detalle->prestamo->c["0"]->interes}}" class="form-control name_list" /></td>
                  <td><input type="text" name="interesMoratorio[]" placeholder="{{round($detalle->prestamo->c["0"]->monto * ($detalle->prestamo->interesMoratorio)/100,2)}}" class="form-control name_list" /></td>

                </tr>
                <tfoot>
                    <tr>
                        <th>correlativo</th>
                        <th>Abono a capital</th>
                        <th>interes</th>
                        <th>interes moratorio</th>

                    </tr>
                </tfoot>
						</table>

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
    function round_it(amount) {
        cents = amount * 100;
        cents = Math.round(cents);
        strCents = "" + cents;
        len = strCents.length;
        return strCents.substring(0, len - 2) + "." + strCents.substring(len - 2, len);
    }
    $(document).ready(function(){
    	var i=1;
      var vector= <?php echo json_encode($detalle->prestamo->c);?>;
      var im=<?php echo json_encode($detalle->prestamo);?>;
      var min=<?php echo json_encode($detalle->prestamo->cmin);?>;
      var max=<?php echo json_encode($detalle->prestamo->cmax);?>;
      var j=1;
      console.log(vector[0].correlativo);
      console.log(im);
    	$('#add').click(function(){
        if(j<vector.length){
      		i++;
      		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" style="width: 50px;" name="correlativo[]" value="'+vector[j].correlativo+'" class="form-control name_list" readonly /><td><input type="text" name="abonoCapital[]" placeholder="'+(vector[j].monto-vector[j].interes)+'" class="form-control name_list" /></td><td><input type="text" name="interes[]" placeholder="'+vector[j].interes+'" class="form-control name_list" /></td><td><input type="text" name="interesMoratorio[]" placeholder="'+(round_it(vector[j].monto * im.interesMoratorio/100,2))+'" class="form-control name_list" /></td></tr>');
          j++;
          console.log(j);
        }else {
          console.log(j);
        }
    	});

    	$(document).on('click', '.btn_remove', function(){
        if (j>1){
      		var button_id = i;
      		$('#row'+button_id+'').remove();
          j=j-1;
          i=i-1;
        }else {
          console.log(j);
        }
    	});

    	$('#submit').click(function(){
    		$.ajax({
    			url:"name.php",
    			method:"POST",
    			data:$('#add_name').serialize(),
    			success:function(data)
    			{
    				alert(data);
    				$('#add_name')[0].reset();
    			}
    		});
    	});

    });
</script>
@endsection
