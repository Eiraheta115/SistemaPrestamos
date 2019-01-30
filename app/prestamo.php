<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prestamo extends Model
{
    public function clientes(){
        return $this->hasOne('App\clienteGarante', 'id');
    }
}
