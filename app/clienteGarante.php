<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clienteGarante extends Model
{
    protected $fillable = [
        'clienteDui','clienteNit', 'clienteNombre','clienteTelefono','clienteCelular','clienteEmail','clienteDireccion'
       ];

    public function prestamos(){
        return $this->belongsTo('App\prestamo', 'cliente_id');
    }
}
