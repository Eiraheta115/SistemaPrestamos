
@extends('layouts.master')
@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3 class="card-title mt-3">Agregar cuenta</h3>
    </div>
    <div class="card-body">
    <form action="{{route('cuentas.store')}}" method="POST">
            @csrf
            <strong>Numero de cuenta</strong>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">10100</span>
                </div>
                <input type="text" name="numeroCuenta" id="numeroCuenta" class="form-control" placeholder="Ingrese su numero de cuenta">
            </div>
            <strong>Nombre del banco</strong>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Banco</span>
                </div>
                <input type="text" name="bancoNombre" id="bancoNombre" class="form-control" placeholder="Ingrese el banco al que pertenece la cuenta">
            </div>
            <strong>Saldo inicial</strong>
            <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$0.00</span>
                    </div>
                    <input type="number" step="0.01" min="0.01" name="saldoInicial" id="saldoInicial" class="form-control" placeholder="Ingrese el saldo inicial de la cuenta">
            </div>
            <strong>Descripcion de la cuenta</strong>
            <div class="form-group">
                <textarea class="form-control" rows="3" name="descripcion" name="id" placeholder="Ingrese descripcion de la cuenta"></textarea>
            </div>
            <button type="submit" class="btn btn-block btn-success">Guardar</button>
        </form>
    </div>
</div>
@endsection  
