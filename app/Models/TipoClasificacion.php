<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoClasificacion extends Model
{
    /**
     *************************************************************************
     * Clase.........: TipoClasificacion
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "tipo_clasificacion"
     * en la BD.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'tipo_clasificacion';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nombre',
    ];
}
