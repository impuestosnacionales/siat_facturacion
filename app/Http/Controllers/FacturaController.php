<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Factura;
use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\Producto;
use App\Models\Sucursal;
use App\Models\Tipo_documento;
use App\Models\Detalle_factura;
use App\Models\User;
use App\Models\Unidad;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producto = Producto::join('unidades', 'productos.unidad_id', '=', 'unidades.id')
                ->select('productos.*', 'unidades.nombre as unidad_nombre')
                ->get();
        $actividad = Actividad::all();
        $sucursal = Sucursal::all();
        $tipodoc = Tipo_documento::all();
        $user = User::all();
        $factura = DB::table('facturas')
            ->select('facturas.id', 'facturas.casos_esp', 'facturas.fecha', 'facturas.cod_auto',
            'sucursales.Nombre as sucursal', 'actividades.Descripcion_o_producto_SIN as actividad',
            'tipo_documentos.Nombre as tipodoc', 'users.nombrers as razons')
            ->leftJoin('sucursales', 'sucursales.id', '=', 'facturas.id_sucursal')
            ->leftJoin('actividades', 'actividades.id', '=', 'facturas.id_actividad')
            ->leftJoin('tipo_documentos', 'tipo_documentos.id', '=', 'facturas.id_tipodoc')
            ->leftJoin('users', 'users.id', '=', 'facturas.id_user')
            ->get();

        return view('Facturas.factura_tabla', [
            'factura' => $factura,
            'actividad' => $actividad,
            'sucursal' => $sucursal,
            'tipodoc' => $tipodoc,
            'user' => $user,
            'producto' => $producto,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $producto = Producto::join('unidades', 'productos.unidad_id', '=', 'unidades.id')
                ->select('productos.*', 'unidades.nombre as unidad_nombre')
                ->get();
        $actividad = Actividad::all();
        $sucursal = Sucursal::all();
        $tipodoc = Tipo_documento::all();
        $user = User::all();
        return view('Facturas.factura', [
            'actividad' => $actividad,
            'sucursal' => $sucursal,
            'tipodoc' => $tipodoc,
            'user' => $user,
            'producto' => $producto,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'id_producto.*' => 'required|integer',
            'cantidad.*' => 'required|numeric|min:1',
            'descuento.*' => 'nullable|numeric',
            'desc_ad.*' => 'nullable|string',
            'id_sucursal' => 'required|integer',
            'id_actividad' => 'required|integer',
            'id_tipodoc' => 'required|integer',
            'id_user' => 'required|integer',
            'fecha' => 'required|date',
            'casos_esp' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $factura = new Factura;
            $factura->casos_esp = $request->get('casos_esp');
            $factura->fecha = $request->get('fecha');
            $factura->id_sucursal = $request->get('id_sucursal');
            $factura->id_actividad = $request->get('id_actividad');
            $factura->id_tipodoc = $request->get('id_tipodoc');
            $factura->id_user = $request->get('id_user');
            $factura->save();
            
            $id_producto = $request->get('id_producto');
            $cantidad = $request->get('cantidad');
            $descuento = $request->get('descuento');
            $desc_ad = $request->get('desc_ad');

            foreach ($id_producto as $index => $producto) {
                $detalle = new Detalle_factura;
                $detalle->id_factura = $factura->id;
                $detalle->id_producto = $producto;
                $detalle->cantidad = $cantidad[$index];
                $detalle->descuento = $descuento[$index];
                $detalle->desc_ad = $desc_ad[$index];
                $detalle->save();
            }
            DB::commit();
            return redirect()->action([FacturaController::class, 'index']);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Error al guardar la factura: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Factura $factura)
    {
        // Funcionalidad para mostrar la factura
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factura $factura)
    {
        // Funcionalidad para editar la factura
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Factura $factura)
    {
        // Funcionalidad para actualizar la factura
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $factura = Factura::findOrFail($id);
        $factura->delete();
        return redirect()->action([FacturaController::class, 'index']);
    }
}
