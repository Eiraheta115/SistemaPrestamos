<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cuota extends Model
{
    protected $fillable = [
        'prestamo_id','fechaPago','monto','saldoCuota','interes','interesMoratorio','cancelado', 'saldoInicial', 'correlativo'
    ];

public function prestamos(){
    return $this->belongsTo('App\prestamo', 'id');
}
}
