<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleAsignacion extends Model
{
    protected $table = 'detalle_asignacion';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'cantidad',
        'herramienta_id',
        'asignacion_herramienta_id',
    ];

    public function herramienta(){
        return $this->belongsTo('App\Models\Herramienta', 'herramienta_id', 'id');
    }
}
