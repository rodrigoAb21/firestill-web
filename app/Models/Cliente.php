<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'id';
    public $timestamps = false;
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
