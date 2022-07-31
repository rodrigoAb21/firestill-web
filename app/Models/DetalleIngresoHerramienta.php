<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleIngresoHerramienta extends Model
{
    /**
     *************************************************************************
     * Clase.........: Categoria
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "categoria" en la BD.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'detalle_ingreso_herramienta';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'ingreso_herramienta',
        'herramienta_id',
        'cantidad',
        'costo',
    ];

    public function herramienta(){
        return $this->belongsTo('App\Models\Herramienta', 'herramienta_id', 'id')->withTrashed();
    }
}
