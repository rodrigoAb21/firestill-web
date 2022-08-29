<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipo';
    protected $primaryKey = 'id';
    public $timestamps = false;
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
        return $this->belongsTo('App\Models\TipoClasificacion', 'tipo_clasificacion_id', 'id');
    }
    public function marca(){
        return $this->belongsTo('App\Models\MarcaClasificacion', 'marca_clasificacion_id', 'id');
    }

    static public $UNIDAD_MEDIDA = [
        'Kg',
        'Lt',
        ];

}
