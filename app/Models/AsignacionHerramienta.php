<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AsignacionHerramienta extends Model
{
    /**
     *************************************************************************
     * Clase.........: AsignacionHerramienta
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla
     * "asignacion_herramienta" en la BD.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'asignacion_herramienta';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'fecha',
        'trabajador_id',
        'estado'
    ];

    public function trabajador(){
        return $this->belongsTo('App\Models\Trabajador', 'trabajador_id', 'id')->withTrashed();
    }
    public function detalles(){
        return $this->hasMany(DetalleAsignacion::class);
    }
    public function reingreso(){
        return $this->hasOne('App\Models\Reingreso');
    }
}
