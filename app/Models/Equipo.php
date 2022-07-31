<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{
    /**
     *************************************************************************
     * Clase.........: Equipo
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "equipo" en la BD.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'equipo';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nro_serie',
        'descripcion',
        'ubicacion',
        'unidad_medida',
        'ano_fabricacion',
        'presion_min',
        'presion_max',
        'longitud_ideal',
        'latitud_ideal',
        'presion_actual',
        'longitud_actual',
        'latitud_actual',
        'sucursal_id',
        'tipo_clasificacion_id',
        'marca_clasificacion_id',
    ];

    public function tipo(){
        return $this->belongsTo('App\Models\TipoClasificacion', 'tipo_clasificacion_id', 'id')->withTrashed();
    }
    public function marca(){
        return $this->belongsTo('App\Models\MarcaClasificacion', 'marca_clasificacion_id', 'id')->withTrashed();
    }

    static public $UNIDAD_MEDIDA = [
        'Kg',
        'Lt',
        ];

}
