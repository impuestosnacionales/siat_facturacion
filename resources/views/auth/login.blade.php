<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/estilos.css') }}">
</head>

<body>
<div class="container">
        <div class="body d-md-flex align-items-center justify-content-between">
            
            <div class=" box-2 d-flex flex-column h-100">
                <div class="mt-5">
                    <form action="{{route('login')}}" method="post">
                    @csrf
                    
                    <div class="card text-center">
                        <img class="card-img-top" src="assets/img/SIAT.jpg" alt="SIAT" />
                        <div class="card-body">
                            <p class="card-text">Ingrese sus datos para iniciar sesión</p> 
                            
                            <div class="form-floating col-12 col-md-12 col-sm-12 col-xs-12">
                                <br><input type="email" name="email" class="form-control" id="floatingNit" placeholder="Correo">
                                <label for="floatingNit">Correo</label>
                            </div><br>
                            <div class="form-floating col-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Contraseña">
                                <label for="floatingPassword">Contraseña</label>
                            </div><br>
                        </div>
                    </div>
                    <!--<p class="small mb-2 pb-lg-2"><a class="text-muted footer" href="#!">Olvidaste tu contraseña?</a></p>-->
                    <div class="col-12 col-md-12 col-sm-12 col-xs-12">
                        <button class="col-12 col-md-12 col-sm-12 col-xs-12 btn btn-primary btn-lg btn-block" type="submit">Ingresar</button>
                    </div>
                    </form>
                </div>
            </div>
            <span class="fas fa-times"></span>
        </div>
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