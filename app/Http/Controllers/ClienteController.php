<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Tipo_documento;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Método para buscar clientes por NIT
    public function buscarPorNit(Request $request)
    {
        $query = Cliente::query();
        $query->select('clientes.id', 'clientes.razon_social', 'clientes.email', 'clientes.nit', 'clientes.celular',
                       'clientes.telefono', 'clientes.complemento', 'tipo_documentos.Nombre as tipodoc')
              ->leftJoin('tipo_documentos', 'tipo_documentos.id', '=', 'clientes.tipodoc_id');

        // Verificar si se proporcionó un NIT para buscar
        if ($request->filled('nit')) {
            $query->where('clientes.nit', 'LIKE', '%' . $request->input('nit') . '%');
        }

        $clientes = $query->get();

        return view('Cliente.cliente', ['cliente' => $clientes]);
    }

    //INDEX
    public function index()
    {
        $cliente= DB::table('clientes')
        ->select('clientes.id','clientes.razon_social','clientes.email','clientes.nit','clientes.celular',
        'clientes.telefono','clientes.complemento','tipo_documentos.Nombre as tipodoc')
        ->leftJoin('tipo_documentos','tipo_documentos.id','=','clientes.tipodoc_id')
        ->get();
        return view('Cliente.cliente',['cliente'=>$cliente]);
    }
    //SHOW: nos permite ver la informacion de un dato en especifico de una tabla se requiere
    public function show($id){
        //findOrFail es un metodo propio de laravel que nos ayuda a encontrar la informacion
        //especifica un dato en funcion a su id
        $cliente = Cliente::findOrFail($id);
        //retornar a una vista llamada ver donde nos muestra la informacion de ese dato
        //la variable curso contiene
        return view('Cliente.cliente_ver',['cliente' => $cliente]);
    }
    //CREATE
    public function create(){
        //
        $tipodoc = Tipo_documento::all();
        return view('Cliente.cliente_crear',['tipodoc' => $tipodoc]);
    }
    //STORE ayuda a crear nuevo curso en la bd
    public function store(Request $request){
        //
        $cliente= new Cliente($request->all());
        //dd($cliente);
        $cliente->save();
        return redirect()->action([ClienteController::class, 'index']);

    }
    //EDIT
    public function edit($id){
        //
        $cliente= Cliente::findOrFail($id);
        $tipodoc= Tipo_documento::all();
        return view('Cliente.cliente_editar',['cliente'=>$cliente],['tipodoc'=>$tipodoc]);
    }
    //UPDATE
    public function update(Request $request, $id){
        //
        $cliente = Cliente::findOrFail($id);
        $cliente->razon_social = $request ->razon_social;
        $cliente->email = $request ->email;
        $cliente->nit = $request ->nit;
        $cliente->celular = $request ->celular;
        $cliente->telefono = $request ->telefono;
        $cliente->complemento = $request ->complemento;
        $cliente->tipodoc_id = $request ->tipodoc_id;
        $cliente->save();
        return redirect()->action([ClienteController::class, 'index']);

    }
}
