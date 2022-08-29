<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contrato';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'periodo',
        'documento',
        'edicion',
        'estado',
        'cliente_id',
        'trabajador_id',
        ];

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente', 'cliente_id', 'id');
    }

    public function trabajador(){
        return $this->belongsTo('App\Models\Trabajador', 'trabajador_id', 'id');
    }

    public function sucursales(){
        return $this->hasMany(Sucursal::class);
    }
}
