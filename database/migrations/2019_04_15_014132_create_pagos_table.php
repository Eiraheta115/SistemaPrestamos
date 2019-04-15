<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->integer('prestamo_id')->unsigned();
            $table->integer('cuenta_id')->unsigned();
            $table->decimal('saldoInicial',6,2);
            $table->decimal('montoRecibido',6,2);
            $table->decimal('interes',6,2);
            $table->decimal('interesMoratorio',6,2);
            $table->decimal('pagoAdicional',6,2);
            $table->decimal('abonoCapital',6,2);
            $table->decimal('saldoFinal',6,2);
            $table->decimal('flujoCaja',6,2);
            $table->decimal('saldoSinMora',6,2);
            $table->decimal('mora',6,2);
            $table->decimal('moraAcumulada',6,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
