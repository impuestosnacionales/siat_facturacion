@extends('base')
@section('name')
    Listado de Clientes
@endsection
@section('content')
<form action="{{ route('cliente.buscarPorNit') }}" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Buscar por NIT" name="nit" value="{{ request('nit') }}">
        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
    </div>
</form>
    <a href="{{ route('cliente.create') }}" class="btn btn-success" role="button">Añadir <i class="bi bi-plus-square"></i></a>
    <hr>
    <table id="tab" class="table ">
        <tr>
            <th>Tipo Documento</th>
            <th>N° Documento/NIT</th>
            <th>Complemento</th>
            <th>Razon Social</th>
            <th>Email</th>
            <th>Celular</th>
            <th>Telefono</th>
        </tr>
        @foreach ($cliente as $cliente)
        <tr>
            <td>{{ $cliente->tipodoc}}</td>
            <td>{{ $cliente->nit}}</td>
            <td>{{ $cliente->complemento}}</td>
            <td>{{ $cliente->razon_social}}</td>
            <td>{{ $cliente->email}}</td>
            <td>{{ $cliente->celular}}</td>
            <td>{{ $cliente->telefono}}</td>
        </tr>
        @endforeach
    </table>
@endsection
