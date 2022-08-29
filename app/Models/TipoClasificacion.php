<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoClasificacion extends Model
{
    protected $table = 'tipo_clasificacion';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
    ];
}
