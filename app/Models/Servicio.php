<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servicio extends Model
{
    /**
     *************************************************************************
     * Clase.........: Servicio
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "servicio" en
     * la BD.
     * Fecha.........: 05-MAR-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'servicio';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nombre',
        'precio',
        'nota_venta_id',
    ];

}
