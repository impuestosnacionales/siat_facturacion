<?php

namespace App\Http\Controllers;

use App\Models\Tipo_documento;
use Illuminate\Http\Request;

class TipoDocumentoController extends Controller
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
        $tipo_documento=Tipo_documento::all();
        return view('Tipo_documento.tipo_documento',['tipo_documento'=>$tipo_documento]);
    }

    public function create()
    {
        //
        return view('Tipo_documento.tipodoc_crear');
    }

    public function store(Request $request)
    {
        //
        $tipo_documento= new Tipo_documento($request->all());
        $tipo_documento->save();
        return redirect()->action([TipoDocumentoController::class, 'index']);
    }
}
