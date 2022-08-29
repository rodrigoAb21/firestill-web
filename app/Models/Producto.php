<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'id';
    public $timestamps = false;
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
        return $this->belongsTo('App\Models\Categoria', 'categoria_id', 'id');
    }
}
