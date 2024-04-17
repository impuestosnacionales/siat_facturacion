<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;
use Illuminate\Support\Facades\DB;


class ActividadController extends Controller
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
        $actividades=Actividad::all();
        return view('actividad', ['actividades'=>$actividades]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('actividad_crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
            DB::beginTransaction();

            $Codigo_Producto_SIN=$request->get('Codigo_Producto_SIN');
            $Codigo_Actividad_CAEB=$request->get('Codigo_Actividad_CAEB');
            $Descripcion_o_producto_SIN=$request->get('Descripcion_o_producto_SIN');
            $cont=0;
            $i=$request->get('indice');
            while($cont<$i){
                $actividad=new Actividad;
                $actividad->Codigo_Producto_SIN=$Codigo_Producto_SIN[$cont];
                $actividad->Codigo_Actividad_CAEB=$Codigo_Actividad_CAEB[$cont];
                $actividad->Descripcion_o_producto_SIN=$Descripcion_o_producto_SIN[$cont];
                $actividad->save();
                $cont++;
            }
            DB::commit();

        }catch(\Exception $e){
            DB::rollback();
        }
        return redirect()->action([ActividadController::class,'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $actividad=Actividad::findorFail($id);
        return view('actividad_ver',['actividad'=>$actividad]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $actividad=Actividad::findOrFail($id);
        return view('actividad_editar',['actividad'=>$actividad]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $actividad=Producto::FindOrFail($id);
        $actvidad->Codigo_Producto_SIN=$request->Codigo_Producto_SIN;
        $actvidad->Codigo_Actividad_CAEB=$request->Codigo_Actividad_CAEB;
        $actvidad->Descripcion_o_producto_SIN=$request->Descripcion_o_producto_SIN;
        $actividad->save();
        return redirect()->action([ActividadController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $actividad=Actividad::findOrFail($id);
        $actividad->delete();
        return redirect()->action([ActividadController::class,'index']);
    }
}
