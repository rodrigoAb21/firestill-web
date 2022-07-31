<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sucursal extends Model
{
    /**
     *************************************************************************
     * Clase.........: Sucursal
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "sucursal" en la BD.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'sucursal';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nombre',
        'direccion',
        'contrato_id',
    ];

    public function equipos(){
        return $this->hasMany(Equipo::class);
    }
}
