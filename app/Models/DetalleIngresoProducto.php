<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleIngresoProducto extends Model
{
    protected $table = 'detalle_ingreso_producto';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'costo',
        'cantidad',
        'producto_id',
        'ingreso_producto_id',
    ];

    public function producto(){
        return $this->belongsTo('App\Models\Producto', 'producto_id', 'id');
    }
}
