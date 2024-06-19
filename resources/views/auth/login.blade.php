<!doctype html>
<html lang="en">

<head>
  <title>SIAT</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/estilos.css') }}">
</head>
<style>
    @media (max-width: 768px) {
    .img-responsive {
        width: 100%;
    }
}

@media (min-width: 769px) and (max-width: 1024px) {
    .img-responsive {
        width: 80%;
    }
}

@media (min-width: 1025px) {
    .img-responsive {
        width: 100%;
    }
}

</style>
<body>
<div class="container">
        <div class="body d-md-flex align-items-center justify-content-between">
            <div class="box-2 d-flex flex-column">
                <div class="">
                    <form action="{{ route('login.store') }}" method="post">
                    @csrf
                    <div class="card text-center">
                        <img class="card-img-top img-responsive" src="assets/img/SIAT.jpg" alt="SIAT" style="display: block; margin: 0 auto;"/>
                        <div class="card-body">
                            <p class="card-text">
                                Ingrese sus datos para iniciar sesión</p> 
                            <input type="email" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Email" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{ $message }}</p>
                            @enderror <br>
                            <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Contraseña" id="password" name="password" required>
                            @error('password')
                                <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{ $message }}</p>
                            @enderror <br>
                            <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="NIT" id="nit" name="nit" value="{{ old('nit') }}" required>
                            @error('nit')
                                <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
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