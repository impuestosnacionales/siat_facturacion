@extends('base')
@section('name')
Listado de Unidad(es) de Medida(s)
@endsection
@section('content')
      <a data-bs-toggle="modal" data-bs-target="#ModalAñadir" href class="btn btn-success" role="button">Añadir <i class="fa-regular fa-square-plus"></i></a>
    <hr>
      <div class="modal fade" id="ModalAñadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <font align="center"><h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Unidad de medida</h1></font>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="message" class="alert alert-success" style="display: none;">Se añadió correctamente</div>
            <form action="{{route('unidad.store' )}}" method="POST" onsubmit="showLoader(); setTimeout(hideLoader, 7000); showMessage();">
              @csrf
              <input type="hidden" name="_token" value="{{csrf_token()}}"> 
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Nombre">
              </div>
              <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  <div class="col-12 col-md-12 justify-content-center">
    <table class="table table-striped table-bordered table-hover">
      <thead class="bg-primary text-white">
        <tr>
          <th>Nombre</th>
          <th>Operaciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($unidades as $unidades)
        <tr>
          <td>{{$unidades->Nombre }}</td>
          <td>
          <form action="{{route('unidad.destroy', $unidades->id)}}" method="POST" style="display:inline;">
            @csrf
            {{method_field('DELETE')}}
            <button class="btn btn-danger" type="submit" value="Eliminar" onclick="return EliminarUnidad('Eliminar Unidad')">
              <i class="fa-solid fa-delete-left"></i>
            </button>
          </form>
          <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success" role="button">
            <i class="fa-solid fa-pen-to-square"></i>
          </a>
        </td>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <font align="center"><h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1></font>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{route('unidad.update', $unidades->id)}}" method="POST" >
                    @csrf
                      {{method_field('PUT')}}
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nombre</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Nombre" value="{{$unidades->Nombre}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </tr>
        @endforeach
      </tbody>
    </table>
    <!-- Agrega este HTML para la pantalla de carga -->
    <div id="loader" class="overlay">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
    <style>
      .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.7); /* Color de fondo semitransparente */
      z-index: 999; /* Asegúrate de que la pantalla de carga esté en la parte superior */
      display: none; /* Por defecto, la pantalla de carga estará oculta */
      }

      .spinner-border {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      }
    </style>
    <script>
    // Función para mostrar la pantalla de carga
    function showLoader() {
    document.getElementById('loader').style.display = 'block';
    // Llama a la función showMessage después de 2 segundos
    setTimeout(showMessage, 2000);
    }

    // Función para ocultar la pantalla de carga
    function hideLoader() {
    document.getElementById('loader').style.display = 'none';
    }

    // Función para mostrar el mensaje
    function showMessage() {
    // Muestra el mensaje
    document.getElementById('message').style.display = 'block';
    }
    </script>
<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
  </form>
</div>
@endsection