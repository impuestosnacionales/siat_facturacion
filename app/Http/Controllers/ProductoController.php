<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Contribuyente;

use App\Models\Producto;

class ProductoController extends Controller
{
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
        $productos=Producto::all();
        return view('Coso.Producto', ['productos'=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $contribuyente=Contribuyente::all();
        return view('Coso.producto_crear',['contribuyente'=>$contribuyente]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $producto= new Producto($request->all());
        $producto->save();
        //dd($producto);
        return redirect()->action([ProductoController::class, 'index']);

        /*
        try{
            DB::beginTransaction();
            $producto=new Producto;
            $producto->Codigo_Producto_SIN=$request->get('Codigo_Producto_SIN');
            $producto->Codigo_Actividad_CAEB=$request->get('Codigo_Actividad_CAEB');
            $producto->Descripcion_o_producto_SIN=$request->get('Descripcion_o_producto_SIN');
            
            $producto->save();

            $id_contribuyente=$request->get('id_contribuyente');
            $Descripcion_Producto_Contribuyente->$request->get('Descripcion_Producto_Contribuyente');
            $Precio->Precio=$request->get('Precio');
            $tarifa->Tarifa->get('Tarifa');

            $cont>=0;

            while($cont->coun($id_contribuyente)){
                $detalle=new Producto;
                $detalle->id_producto=$id_producto->id;
                $detalle->id_contribuyente=$id_contribuyente[$cont];
                $detalle->precio=$precio[$cont];
                $detalle->tarifa=$tarifa[$cont];
                $detalle->save();
                $cont=$cont+1;
            }
            DB::comit();

        }catch(\Exception $e){
            DB::rollback();
        }*/
        dd($detalle);
        //return redirect()->action([ProductoController::class,'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $producto=Producto::findorFail($id);
        return view('Coso.producto_ver',['producto'=>$producto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $producto=Producto::findOrFail($id);
        return view('Coso.producto_editar',['producto'=>$producto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $producto=Producto::FindOrFail($id);
        $producto->Codigo_Producto_SIN=$request->Codigo_Producto_SIN;
        $producto->Codigo_Actividad_CAEB=$request->Codigo_Actividad_CAEB;
        $producto->Descripcion_o_producto_SIN=$request->Descripcion_o_producto_SIN;
        $producto->save();
        return redirect()->action([ProductoController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $producto=Producto::findOrFail($id);
        $producto->delete();
        return redirect()->action([ProductoController::class,'index']);
    }
}
