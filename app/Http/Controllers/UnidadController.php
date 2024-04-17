<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidad;


class UnidadController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $unidades=Unidad::all();
        return view('unidad', ['unidades'=>$unidades]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('unidad_crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $unidad=new Unidad;
        $unidad->Nombre=$request->get('Nombre');
        $unidad->save();
        return redirect()->action([UnidadController::class,'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $unidad=Unidad::findorFail($id);
        return view('unidad_ver',['unidad'=>$unidad]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $unidad=Unidad::findOrFail($id);
        return view('unidad_editar',['unidad'=>$unidad]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $unidad=Producto::FindOrFail($id);
        $unidad->Nombre=$request->Nombre;
        $unidad->save();
        return redirect()->action([UnidadController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $unidad=Unidad::findOrFail($id);
        $unidad->delete();
        return redirect()->action([UnidadController::class,'index']);
    }
}
