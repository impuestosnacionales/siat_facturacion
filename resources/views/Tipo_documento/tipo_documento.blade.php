@extends('base')
@section('name')
    Lista de Tipos de Documentos
@endsection
@section('content')
    <a data-bs-toggle="modal" data-bs-target="#ModalAñadir" href class="btn btn-success" role="button">Añadir <i class="fa-regular fa-square-plus"></i></a>
    <hr>
    
    <!-- MODAL DE AÑADIR -->
    <div class="modal fade" id="ModalAñadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Tipo de Documento Personal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="message" class="alert alert-success" style="display: none;">Se añadió correctamente</div>
                    <form action="{{route('tipodoc.store')}}" method="POST" onsubmit="showLoader(); setTimeout(hideLoader, 7000); showMessage();">
                        @csrf
                        <input type="hidden" name="_token" value="{{csrf_token()}}"> 
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="Nombre">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Código de Documento</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="Codigo_doc">
                        </div>
                        <button type="submit" class="btn btn-primary">Añadir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- TABLA -->
    <div class="col-12 col-md-12 justify-content-center">
        <table id="tab" class="table table-striped table-bordered table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Nombre</th>
                    <th>Codigo de Documento</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipo_documento as $tipo_documento)
                <tr>
                    <td>{{ $tipo_documento->Nombre}}</td>
                    <td>{{ $tipo_documento->Codigo_doc}}</td>
                    <td>
                        <div style="display: flex; align-items: center;">
                            <form action="{{route('tipodoc.destroy', $tipo_documento->id)}}" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger" type="submit" value="Eliminar" onclick="return EliminarTipoDoc('Eliminar Tipo de Documento')">
                                    <i class="fa-solid fa-delete-left"></i>
                                </button>
                            </form>
                            <!-- Botón para ver detalles del documento -->
                            <a data-bs-toggle="modal" data-bs-target="#ModalShow{{$tipo_documento->id}}" class="btn btn-info" role="button">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <!-- Botón para editar -->
                            <a data-bs-toggle="modal" data-bs-target="#exampleModal{{$tipo_documento->id}}" class="btn btn-success" href="" role="button">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </div>
                    </td>

                    <!-- MODAL DE EDITAR -->
                    <div class="modal fade" id="exampleModal{{$tipo_documento->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('tipodoc.update', $tipo_documento->id)}}" method="POST">
                                        @csrf
                                        {{method_field('PUT')}}
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name="Nombre" value="{{$tipo_documento->Nombre}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Código de Documento</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name="Codigo_doc" value="{{$tipo_documento->Codigo_doc}}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL DE MOSTRAR (SHOW) -->
                    <div class="modal fade" id="ModalShow{{$tipo_documento->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detalles del Tipo de Documento</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Mostrar detalles del documento -->
                                    <p><strong>Nombre:</strong> {{ $tipo_documento->Nombre }}</p>
                                    <p><strong>Código de Documento:</strong> {{ $tipo_documento->Codigo_doc }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pantalla de carga -->
        <div id="loader" class="overlay" style="display: none;">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
@endsection
