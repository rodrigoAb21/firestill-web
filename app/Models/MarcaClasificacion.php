<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarcaClasificacion extends Model
{
    /**
     *************************************************************************
     * Clase.........: MarcaClasificacion
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "marca_clasificacion"
     * en la BD.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'marca_clasificacion';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nombre',
    ];
}
