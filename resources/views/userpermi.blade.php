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
    a {
      text-align: center;
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
  <h1>Asignar Roles a usuarios</h1>


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

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
