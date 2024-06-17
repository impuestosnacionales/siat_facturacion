@extends('base')
@section('content')
<div class="card col-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card-header">
            <h2 class="card-title">Listado de Sucursal(es)</h2>
    </div>
    <div class="card-body">
    <a data-bs-toggle="modal" data-bs-target="#ModalAñadir" href class="btn btn-success" role="button">Añadir <i class="fa-regular fa-square-plus"></i></a>
    <hr>
    <!-- MODAL DE AÑADIR -->
    <div class="modal fade" id="ModalAñadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <font align="center"><h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Sucursal</h1></font>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div id="message" class="alert alert-success" style="display: none;">Se añadió correctamente</div>
                  <form action="{{route('sucursal.store')}}" method="POST" onsubmit="showLoader(); setTimeout(hideLoader, 7000); showMessage();">
                      @csrf
                      <input type="hidden" name="_token" value="{{csrf_token()}}"> 
                      <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nombre</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Nombre">
                      </div>
                      <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Ubicacion</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Ubicacion">
                      </div>
                  <button type="submit" class="btn btn-primary">Añadir</button>
                  </form>
              </div>
          </div>
      </div>
    </div>
<!-- TABLA -->
  <div class="col-12 col-md-12 justify-content-center">
    <table class="table table-striped table-bordered table-hover">
      <thead class="bg-primary text-white">
          <tr>
              <th>Nombre</th>
              <th>Ubicacion</th>
              <th>Operaciones</th>
          </tr>
      </thead>
      <tbody>
          @foreach($sucursales as $sucursales)
          <tr>
              <td>{{$sucursales->Nombre}}</td>
              <td>{{$sucursales->Ubicacion}}</td>
              <td>
                  <div style="display: flex; align-items: center;" ><form action="{{route('sucursal.destroy', $sucursales->id)}}" method="POST">
                  @csrf
                  {{method_field('DELETE')}}
                  <button class="btn btn-danger" type="submit" value="Eliminar" onclick="return EliminarSucursal('Eliminar Sucursal')"><i class="fa-solid fa-delete-left"></i></button></form>
                  <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success" href="" role="button"><i class="fa-solid fa-pen-to-square" ></i></a></div>
              </td>
            <!-- MODAL DE EDITAR -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <font align="center"><h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1></font>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="{{route('sucursal.update', $sucursales->id)}}" method="POST">
                              @csrf
                                  {{method_field('PUT')}}
                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Nombre" value="{{$sucursales->Nombre}}">
                              </div>
                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Ubicacion</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Ubicacion" value="{{$sucursales->Ubicacion}}">
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
  </div>
</div>
</div>
@endsection