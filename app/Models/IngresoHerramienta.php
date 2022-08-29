<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IngresoHerramienta extends Model
{
    protected $table = 'ingreso_herramienta';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'fecha',
        'tienda',
        'nro_factura',
        'foto_factura',
        'total',
    ];

    public function detalles(){
        return $this->hasMany(DetalleIngresoHerramienta::class);
    }
}
