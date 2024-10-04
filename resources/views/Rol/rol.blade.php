<!doctype html>
<html lang="en">

<head>
  <title>Roles Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <style>
    body {
      background-color: #f8f9fa;
      color: #343a40;
      font-family: Arial, sans-serif;
    }
    h1 {
      text-align: center;
      margin-top: 20px;
      color: #007bff;
    }
    .table {
      margin: 20px auto;
      max-width: 800px;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    th {
      background-color: #007bff;
      color: black;
    }
    .btn {
      margin-right: 5px;
    }
  </style>
</head>

<body>
  <h1>Gestión de Roles</h1>
  @role('Administrador')
    <div class="text-center">
      <a href="{{ route('rol.create') }}" class="btn btn-outline-warning">Nuevo Rol</a>
    </div>
    @else
    no podes choco
  @endrole
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

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
