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
    public function pdfs()
    {
        //
        return view('pdfs.actividad_pdf');
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


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        /**try{
            $sql = DB::update(" update actividad set Codigo_Producto_SIN=?, Codigo_Actividad_CAEB=?, Descripcion_o_producto_SIN=?", [
                $request->txtCodigo_Producto_SIN,
                $request->txtCodigo_Actividad_CAEB,
                $request->txtDescripcion_o_producto_SIN,
            ]);
        }catch(\Throwable $th){
            $sql=0;
        }
        if($sql==true){
            return back()->with("correcto", "Producto modificado correctamente");
        }else{
            return back()->with("incorrecto", "Error al modificar");
        }**/
        $actividad=Actividad::FindOrFail($id);
        $actividad->Codigo_Producto_SIN=$request->Codigo_Producto_SIN;
        $actividad->Codigo_Actividad_CAEB=$request->Codigo_Actividad_CAEB;
        $actividad->Descripcion_o_producto_SIN=$request->Descripcion_o_producto_SIN;
        $actividad->save();
        return back()->with("correcto", "Producto modificado correctamente");
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
