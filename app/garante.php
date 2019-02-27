<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class garante extends Model
{
    protected $fillable = [
        'nombre','dui','nit','telefono','celular','email','direccion'
       ];
}
