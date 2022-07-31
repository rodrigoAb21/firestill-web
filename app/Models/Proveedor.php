<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    /**
     *************************************************************************
     * Clase.........: Proveedor
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "proveedor" en la BD.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'proveedor';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nombre',
        'nit',
        'email',
        'direccion',
        'telefono',
        'informacion',
        'titular',
        'banco',
        'sucursal',
        'nro_cuenta',
        'moneda',
        'tipo_identificacion',
        'nro_identificacion',

    ];

    public static $MONEDAS = [
        'Boliviano',
        'Dolar',
    ];
    public  static $SUCURSALES = [
        'La Paz',
        'Oruro',
        'Potosí',
        'Cochabamba',
        'Chuquisaca',
        'Tarija',
        'Pando',
        'Beni',
        'Santa Cruz',
    ];
}
