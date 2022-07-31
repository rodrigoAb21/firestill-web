<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleReingreso extends Model
{
    protected $table = 'detalle_reingreso';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'cantidad',
        'motivo',
        'herramienta_id',
        'reingreso_id'
    ];
}
