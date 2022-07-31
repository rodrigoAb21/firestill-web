<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\FichaTecnica;
use Illuminate\Http\Request;

class FichaController extends Controller
{
    public function listarFichas($id){
        return view('vistas.imonitoreo.listarFichas',
            [
                'equipo' => Equipo::findOrFail($id),
                'fichas' => FichaTecnica::where('equipo_id', '=', $id)->orderByDesc('id')->get(),
            ]);
    }
    public function verFicha($id){
        return view('vistas.imonitoreo.verFicha', [
            'ficha' => FichaTecnica::findOrFail($id),
        ]);
    }
}
