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
        width: 50%;
    }
}

</style>
<body>
    <div class="container">
        <div class="body d-md-flex align-items-center justify-content-between">
            <div class="box-2 d-flex flex-column">
                <div class="">
                    <div class="d-flex align-items-center">
                        <form action="{{ route('register.store') }}" method="post">
                            @csrf
                            <div class="card text-center">
                                <img class="card-img-top img-responsive" src="assets/img/SIAT.jpg" alt="SIAT" style="display: block; margin: 0 auto;"/>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <input type="text" class="form-control" placeholder="Usuario" id="name" name="name">
                                                @error('name')
                                                <p class="text-danger mt-2">* {{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <input type="email" class="form-control" placeholder="Email" id="email" name="email">
                                                @error('email')
                                                <p class="text-danger mt-2">* {{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <input type="text" class="form-control" placeholder="NIT" id="nit" name="nit">
                                                @error('nit')
                                                <p class="text-danger mt-2">* {{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <input type="text" class="form-control" placeholder="Nombre o Razón Social" id="nombrers" name="nombrers">
                                                @error('nombrers')
                                                <p class="text-danger mt-2">* {{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <label class="form-label" for="id_rol">Rol</label>
                                                <select class="form-select" name="id_rol" id="id_rol">
                                                    @foreach ($roles as $rol)
                                                        <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                @error('id_rol')
                                                <p class="text-danger mt-2">* {{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <label class="form-label" for="id_dependencia">Dependencia</label>
                                                <select class="form-select" name="id_dependencia" id="id_dependencia">
                                                    @foreach ($dependencias as $dependencia)
                                                        <option value="{{ $dependencia->id }}">{{ $dependencia->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                @error('id_dependencia')
                                                <p class="text-danger mt-2">* {{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <input type="password" class="form-control" placeholder="Contraseña" id="password" name="password">
                                            @error('password')
                                            <p class="text-danger mt-2">* {{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="password" class="form-control" placeholder="Confirma tu contraseña" id="password_confirmation" name="password_confirmation">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block mb-4">Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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