<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Actividad;
use App\Models\Unidad;

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
        $unidad = Unidad::all();
        $actividad = Actividad::all();
        $producto = DB::table('productos')
            ->select('productos.id','productos.cod_pcontribuyente','productos.desc_pcontribuyente',
            'productos.precio',
            'unidades.Nombre as unidad','actividades.Codigo_Producto_SIN as sin',
            'actividades.Codigo_Actividad_CAEB as caeb','actividades.Descripcion_o_producto_SIN as descp')
            ->leftJoin('unidades','unidades.id','=','productos.unidad_id')
            ->leftJoin('actividades','actividades.id','=','productos.actividad_id')
            ->get();
    
        return view('Producto.producto', [
            'producto' => $producto,
            'unidad' => $unidad,
            'actividad' => $actividad,
        ]);
    }
    
    //CREATE
    public function create(){
        //
        $unidad = Unidad::all();
        $actividad = Actividad::all();
        return view('Producto.producto_crear',['unidad' => $unidad],['actividad' => $actividad]);
    }
    //STORE ayuda a crear nuevo curso en la bd
    public function store(Request $request){
        //
        $producto= new Producto($request->all());
        //dd($producto);
        $producto->save();
        return redirect()->action([ProductoController::class, 'index']);

    }
    public function show($id){
        //findOrFail es un metodo propio de laravel que nos ayuda a encontrar la informacion
        //especifica un dato en funcion a su id
        $producto = Producto::findOrFail($id);
        //retornar a una vista llamada ver donde nos muestra la informacion de ese dato
        //la variable curso contiene
        return view('Producto.producto_ver',['producto' => $producto]);
    }
}
