<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dependencia;

class DependenciaController extends Controller
{
    //
    public function index()
    {
        //
        $dependencia=Dependencia::all();
        return view('Dependencia.dependencia',['dependencia'=>$dependencia]);
    }

    public function create()
    {
        //
        return view('Dependencia.dependencia_crear');
    }

    public function store(Request $request)
    {
        //
        $dependencia= new Dependencia($request->all());
        $dependencia->save();
        return redirect()->action([DependenciaController::class, 'index']);
    }
}
