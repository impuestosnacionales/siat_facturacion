@extends('base')

@section('name')
Listado de Sucursal(es)
@endsection

@section('content')
<a data-bs-toggle="modal" data-bs-target="#ModalAñadir" class="btn btn-success" role="button">Añadir <i class="fa-regular fa-square-plus"></i></a>
<hr>

<!-- Modal para Añadir Sucursal -->
<div class="modal fade" id="ModalAñadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Sucursal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="message" class="alert alert-success" style="display: none;">Se añadió correctamente</div>
                <form action="{{ route('sucursal.store') }}" method="POST" onsubmit="showLoader(); showMessage();">
                    @csrf
                    <div class="mb-3">
                        <label for="nombreSucursal" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombreSucursal" name="Nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="ubicacionSucursal" class="form-label">Ubicación</label>
                        <input type="text" class="form-control" id="ubicacionSucursal" name="Ubicacion" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Añadir</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Tabla de Sucursales -->
<div class="col-12 col-md-12 justify-content-center">
    <table class="table table-striped table-bordered table-hover">
        <thead class="bg-primary text-white">
            <tr>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Operaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sucursales as $sucursal)
            <tr>
                <td>{{ $sucursal->Nombre }}</td>
                <td>{{ $sucursal->Ubicacion }}</td>
                <td>
                    <div style="display: flex; align-items: center;">
                        <form action="{{ route('sucursal.destroy', $sucursal->id) }}" method="POST" style="display: inline;">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger" type="submit" value="Eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar esta sucursal?');">
                                <i class="fa-solid fa-delete-left"></i>
                            </button>
                        </form>
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#ModalVer{{ $sucursal->id }}">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalEditar{{ $sucursal->id }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </div>
                </td>
            </tr>

            <!-- Modal para Ver Sucursal -->
            <div class="modal fade" id="ModalVer{{ $sucursal->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detalles de Sucursal</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5>Nombre: {{ $sucursal->Nombre }}</h5>
                            <h5>Ubicación: {{ $sucursal->Ubicacion }}</h5>
                            
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para Editar Sucursal -->
            <div class="modal fade" id="ModalEditar{{ $sucursal->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Sucursal</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('sucursal.update', $sucursal->id) }}" method="POST">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="mb-3">
                                    <label for="nombreSucursal" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombreSucursal" name="Nombre" value="{{ $sucursal->Nombre }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="ubicacionSucursal" class="form-label">Ubicación</label>
                                    <input type="text" class="form-control" id="ubicacionSucursal" name="Ubicacion" value="{{ $sucursal->Ubicacion }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </tbody>
    </table>

    <!-- Pantalla de Carga -->
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
            background-color: rgba(255, 255, 255, 0.7);
            z-index: 999;
            display: none;
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
        }

        // Función para ocultar la pantalla de carga
        function hideLoader() {
            document.getElementById('loader').style.display = 'none';
        }

        // Función para mostrar el mensaje de éxito
        function showMessage() {
            const message = document.getElementById('message');
            message.style.display = 'block'; // Muestra el mensaje
            setTimeout(() => {
                message.style.display = 'none'; // Oculta el mensaje después de 3 segundos
            }, 3000);
        }
    </script>
</div>

<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
@endsection
