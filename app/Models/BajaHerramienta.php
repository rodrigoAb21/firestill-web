<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BajaHerramienta extends Model
{
    protected $table = 'baja_herramienta';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'fecha',
        'motivo',
        'cantidad',
        'herramienta_id',
        'trabajador_id',
        ];

    public function herramienta(){
        return $this->belongsTo('App\Models\Herramienta', 'herramienta_id', 'id');
    }
    public function trabajador(){
        return $this->belongsTo('App\Models\Trabajador', 'trabajador_id', 'id');
    }
}
