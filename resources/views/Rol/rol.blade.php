@extends('base')
@section('name')
    Lista de Roles
@endsection
@section('content')
  <a href="{{ route('rol.create') }}" class="btn btn-outline-warning">Nuevo Rol</a>

<table id="tab" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($rol as $rol)
    <tr>
      <td>{{ $rol->id }}</td>
      <td>{{ $rol->name }}</td>
      <td>
        <a href="{{ route('rol.show', $rol->id) }}" class="btn btn-outline-success">Ver</a>
        <a href="{{ route('rol.edit', $rol->id) }}" class="btn btn-outline-primary">Editar</a>
        <form action="{{ route('rol.destroy', $rol->id) }}" method="POST" style="display:inline;">
          @csrf
          {{ method_field('DELETE') }}
          <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de eliminar este rol?')">Eliminar</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
