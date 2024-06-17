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
          <form action="{{route('documentosf.store')}}" method="POST" onsubmit="showLoader(); setTimeout(hideLoader, 7000); showMessage();">
            @csrf
            <input type="hidden" name="_token" value="{{csrf_token()}}"> 
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Nombre">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Descripcion</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Descripcion">
            </div>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Estado</label>
              <select class="form-select" name="Estado">
                  <option  >Activo</option>
                  <option >Inactivo</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Añadir</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="ModalVer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <font align="center"><h1 class="modal-title fs-5" id="exampleModalLabel">Ver</h1></font>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="message" class="alert alert-success" style="display: none;">Se añadió correctamente</div>
          <form method="POST">
            @csrf
              {{method_field('PUT')}}
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div>
                    <div class="col-12 col-md-12 justify-content-center">
                      <table class="table table-striped table-bordered table-hover">
                        <thead class="bg-primary text-white">
                          <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($documentosf as $documentito)
                          <tr>
                            <td value="">{{$documentito->Nombre}}</td>
                            <td value="">{{$documentito->Descripcion}}</td>
                            <td value="">{{$documentito->Estado}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
          <th>Descripcion</th>
          <th style="visibility:collapse; display:none;">Estado</th>
          <th>Operaciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($documentosf as $documentito)
        <tr>
          <td>{{$documentito->Nombre}}</td>
          <td>{{$documentito->Descripcion}}</td>
          <td style="visibility:collapse; display:none;">{{$documentito->Estado}}</td>
          <td>
            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-pen-to-square" ></i></a>
            <a role="" data-bs-toggle="modal" data-bs-target="#ModalVer"><i class="fa-solid fa-eye"></i></a>
          </td>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <font align="center"><h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1></font>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{route('documentosf.update', $documentito->id)}}" method="POST">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="mb-3">
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Nombre" value="{{$documentito->Nombre}}"style="visibility:collapse; display:none;">
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Descripcion" value="{{$documentito->Descripcion}}"style="visibility:collapse; display:none;">
                    </div>
                    <div class="mb-3">
                      <select name="Estado" class="form-select">
                          <option >Activo</option>
                          <option >Inactivo</option>
                      </select>
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