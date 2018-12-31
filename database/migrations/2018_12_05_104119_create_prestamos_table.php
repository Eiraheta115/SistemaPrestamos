<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->decimal('monto',6,2);
            $table->integer('plazo');
            $table->decimal('interes',6,2);
            $table->decimal('interesMoratorio',6,2);
            $table->date('fecha');
            $table->timestamps();

            $table->foreing('cliente_id')->references('id')->on('cliente_garantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}
