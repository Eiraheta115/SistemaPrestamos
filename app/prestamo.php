<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prestamo extends Model
{
    public function clientes(){
        return $this->hasOne('App\clienteGarante', 'id');
    }

    public function garantes(){
        return $this->hasOne('App\garante', 'id');
    }

    public function cuotas(){
        return $this->hasMany('App\cuota', 'prestamo_id');
    }
}
