@extends('base')

@section('name')
    Listado de Clientes
@endsection

@section('content')
<!-- Mostrar errores de validación -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Formulario para buscar por NIT -->
<form action="{{ route('cliente.buscarPorNit') }}" method="GET">
    <!-- Datos Básicos del Contribuyente (No modificar esta sección) -->
    <div class="mb-3">
        <h5>Datos Básicos del Contribuyente</h5>

        @if(isset($usuario))
            <div>
                <label>NIT:</label>
                <input type="text" class="form-control" value="{{ $usuario->nit }}" readonly>
            </div>
            <div>
                <label>Nombre o Razón Social:</label>
                <input type="text" class="form-control" value="{{ $usuario->razon_social }}" readonly>
            </div>
            <div>
                <label>Dependencia:</label>
                <input type="text" class="form-control" value="{{ $usuario->dependencia->nombre ?? 'No asignada' }}" readonly>
            </div>
        @else
            <div class="alert alert-warning">
                No hay un usuario autenticado.
            </div>
        @endif
    </div>

    <!-- Búsqueda de Clientes -->
    <h5>Búsqueda de Clientes</h5>
    <div class="input-group mb-3">
        <select class="form-select" name="tipodoc_id">
            @foreach($tipodoc as $tipo)
                <option value="{{ $tipo->id }}">{{ $tipo->Nombre }}</option>
            @endforeach
        </select>
        <input type="text" class="form-control" placeholder="NIT" name="nit" value="{{ request('nit') }}">
        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
    </div>
</form>

<!-- Formulario para crear un nuevo cliente -->
<form action="{{ route('cliente.store') }}" method="POST">
    @csrf
    <div>
        <input type="text" name="razon_social" class="form-control" placeholder="Razón Social" value="{{ old('razon_social', $razonSocial) }}" required>
    </div>
    <div>
        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email', $email) }}" required>
    </div>
    <div>
        <input type="text" name="celular" class="form-control" placeholder="Celular" value="{{ old('celular') }}" required>
    </div>
    <div>
        <input type="text" name="telefono" class="form-control" placeholder="Teléfono" value="{{ old('telefono') }}">
    </div>
    <div>
        <input type="text" name="nit" class="form-control" placeholder="NIT" value="{{ old('nit', $nit) }}" required>
    </div>
    <div>
        <select class="form-select" name="tipodoc_id" required>
            @foreach($tipodoc as $tipo)
                <option value="{{ $tipo->id }}">{{ $tipo->Nombre }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary" type="submit">Guardar</button>
</form>

<hr>
<!-- Tabla de clientes encontrados -->
@if(isset($clientes) && !$clientes->isEmpty())
    <table id="tab" class="table">
        <tr>
            <th>Tipo Documento</th>
            <th>N° Documento/NIT</th>
            <th>Complemento</th>
            <th>Razón Social</th>
            <th>Email</th>
            <th>Celular</th>
            <th>Teléfono</th>
        </tr>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{ $cliente->tipodoc }}</td>
            <td>{{ $cliente->nit }}</td>
            <td>{{ $cliente->complemento }}</td>
            <td>{{ $cliente->razon_social }}</td>
            <td>{{ $cliente->email }}</td>
            <td>{{ $cliente->celular }}</td>
            <td>{{ $cliente->telefono }}</td>
        </tr>
        @endforeach
    </table>
@endif
@endsection
