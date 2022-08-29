<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarcaClasificacion extends Model
{
    protected $table = 'marca_clasificacion';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
    ];
}
