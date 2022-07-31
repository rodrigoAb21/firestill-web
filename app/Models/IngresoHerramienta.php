<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IngresoHerramienta extends Model
{
    /**
     *************************************************************************
     * Clase.........: IngresoHerramienta
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "ingreso_herramienta"
     * en la BD.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'ingreso_herramienta';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'fecha',
        'tienda',
        'nro_factura',
        'foto_factura',
        'total',
    ];

    public function detalles(){
        return $this->hasMany(DetalleIngresoHerramienta::class);
    }
}
