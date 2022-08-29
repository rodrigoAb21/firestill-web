<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FichaTecnica extends Model
{
    protected $table = 'ficha_tecnica';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'fecha',
        'eCanioPesca',
        'eZuncho',
        'eChasis',
        'eRueda',
        'eRosca',
        'eManguera',
        'eValvula',
        'eTobera',
        'eRobinete',
        'ePalanca',
        'eManometro',
        'eVastago',
        'eDifusor',
        'eDisco',
        'carga',
        'observacion',
        'resultado',
        'trabajador_id',
        'equipo_id',
    ];

    public function equipo(){
        return $this->belongsTo('App\Models\Equipo', 'equipo_id', 'id');
    }

    public function trabajador(){
        return $this->belongsTo('App\Models\Trabajador', 'trabajador_id', 'id');
    }
}
