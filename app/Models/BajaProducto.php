<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BajaProducto extends Model
{
    protected $table = 'baja_producto';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'fecha',
        'motivo',
        'cantidad',
        'producto_id',
    ];

    public function Producto(){
        return $this->belongsTo('App\Models\Producto', 'producto_id', 'id');
    }
}
