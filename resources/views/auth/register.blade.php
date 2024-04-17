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
                    <p class="mb-1 h-1">Crea tu Cuenta</p>
                    <div class="d-flex flex-column ">
                    <div class="d-flex align-items-center">
                        <form action="{{route('register')}}" method="post">
                        @csrf
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                <input type="text" name="name"  id="form3Example1" class="form-control" placeholder="Nombre" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                <input type="text" name="last_name" id="form3Example2" class="form-control" placeholder="Apellido" />
                                </div>
                            </div>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" name="email" id="form3Example3" class="form-control" placeholder="Correo" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="form3Example4" class="form-control" placeholder="Contraseña" />
                        </div>
                        <div class="form-outline mb-4">
                            <input type="password" name="password_confirmation" id="form3Example4" class="form-control" placeholder="Confirmar Contraseña" />
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">Registrar</button>

                    </form>
                </div>

                <div class="mt-1">
                    <p class="mb-0 text-muted">Ya tienes una cuenta? <a class="text-muted" href="{{route('login')}}">Iniciar Sesión</a></p>
                </div>

                <div class="mt-3">
                    <p class="footer text-muted mb-0 mt-md-0 mt-4">Al registrarte estás de acuerdo con nuestros
                        <span class="p-color me-1">términos y condiciones</span>y
                        <span class="p-color ms-1">política de privacidad</span>
                    </p>
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