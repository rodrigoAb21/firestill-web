<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleIngresoHerramienta extends Model
{
    protected $table = 'detalle_ingreso_herramienta';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'ingreso_herramienta',
        'herramienta_id',
        'cantidad',
        'costo',
    ];

    public function herramienta(){
        return $this->belongsTo('App\Models\Herramienta', 'herramienta_id', 'id');
    }
}
