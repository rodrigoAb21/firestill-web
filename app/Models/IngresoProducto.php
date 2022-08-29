<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IngresoProducto extends Model
{
    protected $table = 'ingreso_producto';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'fecha',
        'nro_factura',
        'foto_factura',
        'total',
        'proveedor_id',
    ];

    public function proveedor(){
        return $this->belongsTo('App\Models\Proveedor', 'proveedor_id', 'id');
    }
    public function detalles(){
        return $this->hasMany(DetalleIngresoProducto::class);
    }
}
