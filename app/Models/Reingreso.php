<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reingreso extends Model
{
    protected $table = 'reingreso';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'fecha',
        'asignacion_herramienta_id'
    ];

    public function detalles(){
        return $this->hasMany(DetalleReingreso::class);
    }
}
