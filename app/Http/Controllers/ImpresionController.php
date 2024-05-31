<?php

namespace App\Http\Controllers;
use App\Models\Impresion;

use Illuminate\Http\Request;

class ImpresionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $impresion=Impresion::all();
        return view('Impresion.impresion',['impresion'=>$impresion]);
    }

    public function create()
    {
        //
        return view('Impresion.impresion_crear');
    }

    public function store(Request $request)
    {
        //
         
        if ($request->has('logo')) {
            $impresion = new Impresion($request->except('logo'));
            
            $logoFile = $request->file('logo');
            $path = 'assets/img/';
            $filename = date('YmdHis') . "." . $logoFile->getClientOriginalExtension();
            $logoFile->move($path, $filename);

            /*$filename = time() . '.' . $logoFile->getClientOriginalExtension();
            
            $logoFile->move(public_path('assets/img/'), $filename);
            $impresion->logo = 'assets/img/' . $filename;
            dd($impresion);*/
            $impresion->logo = 'assets/img/$filename';
        } /*else {
            alert("no");
            $impresion = new Impresion($request->except('logo'));
            $impresion->logo = 'assets/img/predeterminado.png';*/
        /*}*/
        $impresion->save();
        return redirect()->action([ImpresionController::class, 'index']);
    }

    public function show(string $id)
    {
        //
        $impresion=Impresion::findorFail($id);
        return view('Impresion.impresion_ver',['impresion'=>$impresion]);
    }

}
