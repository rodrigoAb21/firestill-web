<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Alerta extends Model
{
    /**
     *************************************************************************
     * Clase.........: Alerta
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "alerta" en la BD.
     * Fecha.........: 17-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'alerta';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'fecha',
        'descripcion',
        'estado',
        'equipo_id',
        ];

    public static function cantidad(){
        $cantidad = DB::table('alerta')->where('estado','=',true)->count();
        return $cantidad;
    }
}
