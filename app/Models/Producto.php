<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    /**
     *************************************************************************
     * Clase.........: Producto
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "producto" en la BD.
     * Fecha.........: 03-MAR-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'producto';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nombre',
        'foto',
        'origen',
        'descripcion',
        'precio',
        'cantidad',
        'categoria_id',
        'proveedor_id',
    ];

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria', 'categoria_id', 'id')->withTrashed();
    }
}
