<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignacionHerramienta extends Model
{
    protected $table = 'asignacion_herramienta';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'fecha',
        'trabajador_id',
        'estado'
    ];

    public function trabajador(){
        return $this->belongsTo('App\Models\Trabajador', 'trabajador_id', 'id');
    }
    public function detalles(){
        return $this->hasMany(DetalleAsignacion::class);
    }
    public function reingreso(){
        return $this->hasOne('App\Models\Reingreso');
    }
}
