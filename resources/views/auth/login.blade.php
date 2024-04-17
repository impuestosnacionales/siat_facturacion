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
            <div class="box-1 mt-md-0 mt-5">
                <img src="https://images.pexels.com/photos/2033997/pexels-photo-2033997.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                    class="" alt="">
            </div>
            <div class=" box-2 d-flex flex-column h-100">
                <div class="mt-5">
                    <form action="{{route('login')}}" method="post">
                    @csrf

                    <p class="mb-1 h-1">Iniciar Sesión</p>
                    
                    <div class="d-flex flex-column ">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example18">Correo</label>
                            <input type="email" id="form2Example18" name="email" class="form-control" placeholder="Ingresa tu correo"/>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example28">Contraseña</label>
                            <input type="password" id="form2Example28" name="password" class="form-control" />
                            
                        </div>
                    <!--<p class="small mb-2 pb-lg-2"><a class="text-muted footer" href="#!">Olvidaste tu contraseña?</a></p>-->
                        <div class="pt-1 mb-2 ">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Ingresar</button>
                        </div>

                        
                        <!--<div class="mt-3">
                            <p class="mb-0 text-muted">Aún no tienes una cuenta? <a class="text-muted" href="{{route('register')}}">Registrate</a></p>
                        </div>-->
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