<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clienteGarante extends Model
{
    protected $fillable = [
        'clienteDui','clienteNombre','clienteTelefono','clienteCelular','clienteEmail','clienteDireccion','garanteDui','garanteNombre','garanteTelefono','garanteCelular','garanteEmail','garanteDireccion'
       ];

    public function prestamos(){
        return $this->hasMany('App\prestamo', 'cliente_id');
    }
}
