@extends('base')
@section('name')
  Asignar Roles a usuarios
@endsection
@section('content')
  <table id="tab" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>
            <a href="{{ route('asignar.edit', $user->id)}}" class="btn btn-outline-success">Editar</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <a href="" class="btn btn-outline-success">Agregar Rol</a>
@endsection
