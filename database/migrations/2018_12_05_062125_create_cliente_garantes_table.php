<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteGarantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_garantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clienteDui');
            $table->string('clienteNit');
            $table->string('clienteNombre');
            $table->string('clienteTelefono');
            $table->string('clienteCelular');    
            $table->string('clienteEmail');
            $table->string('clienteDireccion');
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
        Schema::dropIfExists('cliente_garantes');
    }
}
