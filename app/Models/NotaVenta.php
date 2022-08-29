<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotaVenta extends Model
{
    protected $table = 'nota_venta';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'fecha',
        'tipo',
        'total',
        'trabajador_id',
        'cliente_id',
    ];

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente', 'cliente_id', 'id');
    }

    public function trabajador(){
        return $this->belongsTo('App\Models\Trabajador', 'trabajador_id', 'id');
    }

    public function detalles(){
        return $this->hasMany(DetalleNotaVenta::class);
    }

    public function servicios(){
        return $this->hasMany(Servicio::class);
    }
}
