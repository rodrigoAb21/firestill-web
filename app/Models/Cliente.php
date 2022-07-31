<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    /**
     *************************************************************************
     * Clase.........: Cliente
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "cliente" en la BD.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'cliente';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nombre_empresa',
        'nit',
        'email',
        'email_encargado',
        'telefono_empresa',
        'direccion',
        'nombre_encargado',
        'cargo_encargado',
        'telefono_encargado',
    ];
}
