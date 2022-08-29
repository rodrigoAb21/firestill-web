<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleNotaVenta extends Model
{
    protected $table = 'detalle_nota_venta';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'cantidad',
        'precio',
        'nota_venta_id',
        'producto_id',
    ];

    public function producto(){
        return $this->belongsTo('App\Models\Producto', 'producto_id', 'id');
    }
}
