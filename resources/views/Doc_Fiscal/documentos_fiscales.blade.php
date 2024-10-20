@extends('base')

@section('name')
  Listado de Documentos Fiscales
@endsection

@section('content')
  <a data-bs-toggle="modal" data-bs-target="#ModalAñadir" href class="btn btn-success" role="button">Añadir <i class="fa-regular fa-square-plus"></i></a>
  <hr>
  <!-- MODAL DE AÑADIR -->
  <div class="modal fade" id="ModalAñadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <font align="center"><h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Documento Fiscal</h1></font>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="message" class="alert alert-success" style="display: none;">Se añadió correctamente</div>
          <form action="{{ route('documentosf.store') }}" method="POST" onsubmit="showLoader(); setTimeout(hideLoader, 7000); showMessage();">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="Nombre">
            </div>
            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción</label>
              <input type="text" class="form-control" id="descripcion" name="Descripcion">
            </div>
            <div class="mb-3">
              <label for="estado" class="form-label">Estado</label>
              <select class="form-select" name="Estado">
                <option>Activo</option>
                <option>Inactivo</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Añadir</button>
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
          <th>Descripción</th>
          <th style="visibility:collapse; display:none;">Estado</th>
          <th>Operaciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($documentosf as $documentito)
        <tr>
          <td>{{ $documentito->Nombre }}</td>
          <td>{{ $documentito->Descripcion }}</td>
          <td style="visibility:collapse; display:none;">{{ $documentito->Estado }}</td>
          <td>
            <a href="" data-bs-toggle="modal" data-bs-target="#ModalEditar{{ $documentito->id }}"><i class="fa-solid fa-pen-to-square"></i></a>
            <a data-bs-toggle="modal" data-bs-target="#ModalVer{{ $documentito->id }}"><i class="fa-solid fa-eye"></i></a>
            <form action="{{ route('documentosf.destroy', $documentito->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este documento?');">
              @csrf
              {{ method_field('DELETE') }}
              <button class="btn" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta unidad?');">
                <i class="fa-solid fa-delete-left"></i>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <!-- MODAL DE EDITAR -->
    @foreach($documentosf as $documentito)
      <div class="modal fade" id="ModalEditar{{ $documentito->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Documento Fiscal</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('documentosf.update', $documentito->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <div class="mb-3">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="Nombre" value="{{ $documentito->Nombre }}" required>
                </div>
                <div class="mb-3">
                  <label for="descripcion" class="form-label">Descripción</label>
                  <input type="text" class="form-control" id="descripcion" name="Descripcion" value="{{ $documentito->Descripcion }}" required>
                </div>
                <div class="mb-3">
                  <label for="estado" class="form-label">Estado</label>
                  <select class="form-select" name="Estado" required>
                    <option value="Activo" {{ $documentito->Estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Inactivo" {{ $documentito->Estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endforeach

    <!-- MODAL VER -->
    @foreach($documentosf as $documentito)
      <div class="modal fade" id="ModalVer{{ $documentito->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Ver Documento Fiscal</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p><strong>Nombre:</strong> {{ $documentito->Nombre }}</p>
              <p><strong>Descripción:</strong> {{ $documentito->Descripcion }}</p>
              <p><strong>Estado:</strong> {{ $documentito->Estado }}</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    @endforeach

    <!-- Agrega este HTML para la pantalla de carga -->
    <div id="loader" class="overlay">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

    <!-- Agrega este CSS para estilizar la pantalla de carga -->
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
      function showLoader() {
        document.getElementById('loader').style.display = 'block';
        setTimeout(showMessage, 2000);
      }
      function hideLoader() {
        document.getElementById('loader').style.display = 'none';
      }
      function showMessage() {
        document.getElementById('message').style.display = 'block';
      }
    </script>
  </div>
@endsection
