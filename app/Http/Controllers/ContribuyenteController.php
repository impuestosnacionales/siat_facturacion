<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contribuyente;

class ContribuyenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $contribuyentes=Contribuyente::all();
        return view('Coso.contribuyente',['contribuyente'=>$contribuyentes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Coso.contribuyente_crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $contribuyente=new contribuyente;
        $contribuyente->Descripcion_Producto_Contribuyente=$request->get('Descripcion_Producto_Contribuyente');
        $contribuyente->Precio=$request->get('Precio');
        $contribuyente->Unidad_de_Medida=$request->get('Unidad_de_Medida');
        $contribuyente->save();
        return redirect()->action([ContribuyenteController::class,'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $contribuyente=Contribuyente::findorFail($id);
        return view('Coso.contribuyente_ver',['contribuyente'=>$contribuyente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $contribuyente=Contribuyente::findOrFail($id);
        return view('Coso.contribuyente_editar',['contribuyente'=>$contribuyente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $contribuyente=Contribuyente::FindOrFail($id);
        $contribuyente->Descripcion_Producto_Contribuyente=$request->Descripcion_Producto_Contribuyente;
        $contribuyente->Precio=$request->Precio;
        $contribuyente->Unidad_de_Medida=$request->Unidad_de_Medida;
        $contribuyente->save();
        return redirect()->action([ContribuyenteController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $contribuyente=Contribuyente::findOrFail($id);
        $contribuyente->delete();
        return redirect()->action([ContribuyenteController::class,'index']);
    }
}
