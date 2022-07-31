<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BajaProducto extends Model
{
    /**
     *************************************************************************
     * Clase.........: BajaProducto
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "baja_producto" en
     * la BD.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'baja_producto';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'fecha',
        'motivo',
        'cantidad',
        'producto_id',
    ];

    public function Producto(){
        return $this->belongsTo('App\Models\Producto', 'producto_id', 'id')->withTrashed();
    }
}
