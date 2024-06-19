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
    public function index(Request $request)
    {
        $unidad = Unidad::all();

        // Aplicar búsqueda por descripción de Producto SIN si existe
        $query = Actividad::query();
        if ($request->has('descripcion')) {
            $query->where('Descripcion_o_producto_SIN', 'like', '%' . $request->descripcion . '%');
        }
        $actividad = $query->paginate(7); // Paginar por 7 elementos por página

        $producto = DB::table('productos')
            ->select('productos.id', 'productos.cod_pcontribuyente', 'productos.desc_pcontribuyente',
                'productos.precio',
                'unidades.Nombre as unidad', 'actividades.Codigo_Producto_SIN as sin',
                'actividades.Codigo_Actividad_CAEB as caeb', 'actividades.Descripcion_o_producto_SIN as descp')
            ->leftJoin('unidades', 'unidades.id', '=', 'productos.unidad_id')
            ->leftJoin('actividades', 'actividades.id', '=', 'productos.actividad_id')
            ->get();

        return view('Producto.producto', [
            'producto' => $producto,
            'unidad' => $unidad,
            'actividad' => $actividad,
        ]);
    }


    public function store(Request $request)
    {
        $producto = new Producto($request->all());
        //
        $producto= DB::table('productos')
        ->select('productos.id','productos.cod_pcontribuyente','productos.desc_pcontribuyente',
        'productos.precio',
        'unidades.Nombre as unidad','actividades.Codigo_Producto_SIN as sin',
        'actividades.Codigo_Actividad_CAEB as caeb','actividades.Descripcion_o_producto_SIN as descp')
        ->leftJoin('unidades','unidades.id','=','productos.unidad_id')
        ->leftJoin('actividades','actividades.id','=','productos.actividad_id')
        ->get();
        return view('Producto.producto', ['producto'=>$producto]);
    }
    //CREATE
    public function create(){
        //
        $unidad = Unidad::all();
        $actividad = Actividad::all();
        return view('Producto.producto_crear',['unidad' => $unidad],['actividad' => $actividad]);
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('Producto.producto_ver', ['producto' => $producto]);
    }

    public function destroy(string $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('producto.index');
    }

    public function update(Request $request, string $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->desc_pcontribuyente = $request->desc_pcontribuyente;
        $producto->save();
        return back()->with("correcto", "Producto modificado correctamente");
    }
}


