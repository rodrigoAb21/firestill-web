<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleIngresoProducto extends Model
{
    /**
     *************************************************************************
     * Clase.........: DetalleIngresoProducto
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "detalle_ingreso_producto"
     * en la BD.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'detalle_ingreso_producto';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'costo',
        'cantidad',
        'producto_id',
        'ingreso_producto_id',
    ];

    public function producto(){
        return $this->belongsTo('App\Models\Producto', 'producto_id', 'id')->withTrashed();
    }
}
