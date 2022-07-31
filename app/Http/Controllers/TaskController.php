<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class TaskController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return view('vistas.datata.index',[
        'clientes' => Cliente::orderBy('id', 'desc')->paginate(10),
            ]);

    }

    /**
     * @return mixed
     */
    public function getTasks()
    {
       // echo "okkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk";
        $tasks = Task::select(['id','name','category','state']);
        return Datatables::of($tasks)

            ->make(true);
    }

}
