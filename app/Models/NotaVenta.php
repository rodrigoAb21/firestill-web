<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotaVenta extends Model
{
    /**
     *************************************************************************
     * Clase.........: NotaVenta
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "nota_venta" en
     * la BD.
     * Fecha.........: 05-MAR-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'nota_venta';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'fecha',
        'tipo',
        'total',
        'trabajador_id',
        'cliente_id',
    ];

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente', 'cliente_id', 'id')->withTrashed();
    }

    public function trabajador(){
        return $this->belongsTo('App\Models\Trabajador', 'trabajador_id', 'id')->withTrashed();
    }

    public function detalles(){
        return $this->hasMany(DetalleNotaVenta::class);
    }

    public function servicios(){
        return $this->hasMany(Servicio::class);
    }
}
