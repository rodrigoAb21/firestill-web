<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BajaHerramienta extends Model
{
    /**
     *************************************************************************
     * Clase.........: BajaHerramienta
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "baja_erramienta" en
     * la BD.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'baja_herramienta';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'fecha',
        'motivo',
        'cantidad',
        'herramienta_id',
        'trabajador_id',
        ];

    public function herramienta(){
        return $this->belongsTo('App\Models\Herramienta', 'herramienta_id', 'id')->withTrashed();
    }
    public function trabajador(){
        return $this->belongsTo('App\Models\Trabajador', 'trabajador_id', 'id')->withTrashed();
    }
}
