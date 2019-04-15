<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuotas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prestamo_id')->unsigned();
            $table->integer('cuota_id')->nullable()->unsigned();
            $table->integer('correlativo')->nullable();
            $table->date('fechaPago');
            $table->decimal('saldoInicial',6,2)->nullable();
            $table->decimal('monto',6,2);
            $table->decimal('saldoCuota',6,2);
            $table->decimal('interes',6,2);
            $table->decimal('interesMoratorio',6,2);
            $table->boolean('cancelado');
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
        Schema::dropIfExists('cuotas');
    }
}
