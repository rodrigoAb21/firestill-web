<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IngresoProducto extends Model
{
    /**
     *************************************************************************
     * Clase.........: IngresoProducto
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "ingreso_producto"
     * en la BD.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'ingreso_producto';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'fecha',
        'nro_factura',
        'foto_factura',
        'total',
        'proveedor_id',
    ];

    public function proveedor(){
        return $this->belongsTo('App\Models\Proveedor', 'proveedor_id', 'id')->withTrashed();
    }
    public function detalles(){
        return $this->hasMany(DetalleIngresoProducto::class);
    }
}
