<!doctype html>
<html lang="en">

<head>
  <title>Editar Rol</title>
  <!-- Required meta tags -->
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
    h2 {
      text-align: center;
      color: darkorange;
      margin-top: 20px;
    }
    .form-container {
      max-width: 500px;
      margin: 20px auto;
      padding: 20px;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    label {
      font-weight: bold;
    }
    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ced4da;
      border-radius: 4px;
    }
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: darkorange;
      border: none;
      color: white;
      font-weight: bold;
      border-radius: 4px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #ff8c00;
    }
    a {
      color: darkorange;
      display: block;
      text-align: center;
      margin-top: 20px;
      font-weight: bold;
    }
    a:hover {
      color: white;
      background-color: darkorange;
      border-radius: 5px;
    }
  </style>
</head>

<body>
  <h2>Editar Rol</h2>
  <div class="form-container">
    <form action="{{ route('rol.update', $rol->id) }}" method="post">
      @csrf
      {{ method_field('PUT') }}
      
      <label>Nombre del rol:</label>
      <input type="text" name="name" value="{{ $rol->name }}" required>
      
      <label>Guard Name:</label>
      <input type="text" name="guard_name" value="{{ $rol->guard_name }}" required>
      
      <input type="submit" value="Actualizar">
    </form>
      <a href="{{ route('rol') }}">Volver a la lista de Roles</a>

  </div>


  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>