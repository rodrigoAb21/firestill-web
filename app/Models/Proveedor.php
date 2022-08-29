<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedor';
    protected $primaryKey = 'id';
    public $timestamps = false;
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
