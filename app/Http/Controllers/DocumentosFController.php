<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentosF;
class DocumentosFController extends Controller
{
    //
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
            $documentosf=DocumentosF::all();
            return view('documentos_fiscales', ['documentosf'=>$documentosf]);
        }
    
        /**
         * Show the form for creating a new resource.
         */
    
    
        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            //
            $documentof=new DocumentosF;
            $documentof->Nombre=$request->get('Nombre');
            $documentof->Descripcion=$request->get('Descripcion');
            $documentof->Estado=$request->get('Estado');
            $documentof->save();
            return redirect()->action([DocumentosFController::class,'index']);
        }
    
        /**
         * Display the specified resource.
         */
    
    
        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            //
            $documentof=DocumentosF::FindOrFail($id);
            $documentof->Nombre=$request->Nombre;
            $documentof->Descripcion=$request->Descripcion;
            $documentof->Estado=$request->Estado;
            $documentof->save();
            return back()->with("correcto", "Producto modificado correctamente");
        }
    
        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            //
            $documentof=DocumentosF::findOrFail($id);
            $documentof->delete();
            return redirect()->action([DocumentosFController::class,'index']);
        }
}
