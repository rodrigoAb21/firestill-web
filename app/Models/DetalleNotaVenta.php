<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleNotaVenta extends Model
{
    /**
     *************************************************************************
     * Clase.........: DetalleNotaVenta
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "detalle_nota_venta" en
     * la BD.
     * Fecha.........: 05-MAR-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'detalle_nota_venta';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'cantidad',
        'precio',
        'nota_venta_id',
        'producto_id',
    ];

    public function producto(){
        return $this->belongsTo('App\Models\Producto', 'producto_id', 'id')->withTrashed();
    }
}
