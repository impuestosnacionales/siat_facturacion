@extends('base')

@section('name')
  Listado de Documentos por Sector
@endsection

@section('content')
  <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalCrear">Agregar <i class="fa-solid fa-user-plus"></i></a>
  <hr>

  <!-- Modal Crear -->
  <div class="modal fade" id="ModalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Documentos por sector</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('documentos.store')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label">Descripción</label>
              <input type="text" class="form-control" name="Descripcion" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Características</label>
              <input type="text" class="form-control" name="Caracteristicas" required>
            </div>
            <div class="mb-3">
              <label>Tipo de documento/factura</label>
              <select class="form-select" name="Tipo_documento" required>
                @foreach($DocumentosF as $doc)
                  <option value="{{$doc->id}}">{{$doc->Nombre}}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary form-control">Añadir</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div id="message" class="alert alert-success" style="display: none;">La acción se realizó correctamente</div>

  <!-- Modal Ver -->
  <div class="modal fade" id="ModalVer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Ver Documento</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <table class="table table-striped table-bordered table-hover">
                    <thead class="bg-primary text-white">
                      <tr>
                        <th>Descripción</th>
                        <th>Características</th>
                        <th>Tipo de factura/documento</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($documentoss as $documentoh)
                        <tr>
                          <td>{{ $documentoh->Descripcion }}</td>
                          <td>{{ $documentoh->Caracteristicas }}</td>
                          <td>{{ $documentoh->DocumentosF->Nombre }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tabla de documentos -->
  <div class="col-12">
    <table class="table table-striped table-bordered table-hover">
      <thead class="bg-primary text-white">
        <tr>
          <th>Descripción</th>
          <th>Características</th>
          <th style="visibility:collapse; display:none;">Tipo de Factura/Documento</th>
          <th>Operaciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($documentoss as $documentoh)
          <tr>
            <td>{{ $documentoh->Descripcion }}</td>
            <td>{{ $documentoh->Caracteristicas }}</td>
            <td style="visibility:collapse; display:none;">{{ $documentoh->Tipo_documento }}</td>
            <td>
              <a data-bs-toggle="modal" data-bs-target="#ModalVer"><i class="fa-solid fa-eye"></i></a>
              <a data-bs-toggle="modal" data-bs-target="#ModalEditar{{ $documentoh->id }}"><i class="fa-solid fa-edit"></i></a>
              <form action="{{ route('documentos.destroy', $documentoh->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este documento?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-link text-danger"><i class="fa-solid fa-delete-left"></i></button>
              </form>
            </td>
          </tr>

          <!-- Modal Editar -->
          <div class="modal fade" id="ModalEditar{{ $documentoh->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Documento</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('documentos.update', $documentoh->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label class="form-label">Descripción</label>
                      <input type="text" class="form-control" name="Descripcion" value="{{ $documentoh->Descripcion }}" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Características</label>
                      <input type="text" class="form-control" name="Caracteristicas" value="{{ $documentoh->Caracteristicas }}" required>
                    </div>
                    <div class="mb-3">
                      <label>Tipo de documento/factura</label>
                      <select class="form-select" name="Tipo_documento" required>
                        @foreach($DocumentosF as $doc)
                          <option value="{{$doc->id}}" {{ $documentoh->Tipo_documento == $doc->id ? 'selected' : '' }}>{{$doc->Nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary form-control">Guardar Cambios</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Loader -->
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
@endsection
