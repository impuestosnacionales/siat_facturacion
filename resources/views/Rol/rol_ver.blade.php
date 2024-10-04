<!doctype html>
<html lang="en">

<head>
  <title>Ver Rol</title>
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
      color: dodgerblue;
      margin-top: 20px;
    }
    .info-label {
      font-weight: bold;
    }
    .info-container {
      max-width: 600px;
      margin: 20px auto;
      padding: 20px;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    a {
      color: dodgerblue;
      font-weight: bold;
      display: block;
      text-align: center;
      margin-top: 20px;
    }
    a:hover {
      color: white;
      background-color: dodgerblue;
      border-radius: 5px;
    }
  </style>
</head>

<body>
  <h2>Ver Rol</h2>

  <div class="info-container">
    <label class="info-label">Nombre:</label>
    <span>{{ $rol->name }}</span><br>
    <label class="info-label">Guard Name:</label>
    <span>{{ $rol->guard_name }}</span><br>
      <a href="{{ route('rol') }}" class="btn btn-outline-primary">Volver a la lista de Roles</a>

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
