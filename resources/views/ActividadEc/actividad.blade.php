@extends('base')
@section('name')
    Listado de Productos y Servicios Asignados por su(s) Actividad(es) Economica(s)
@endsection
@section('content')
<br>
          <a href=""class="btn btn-success" role="button" data-bs-toggle="modal" data-bs-target="#ModalCrear">Añadir <i class="fa-regular fa-square-plus"></i></a>
    <!-- Modal -->
    <div class="modal fade" id="ModalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <font align="center"><h1 class="modal-title fs-5" id="exampleModalLabel">Agregar productos o servicios</h1></font>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <div id="message" class="alert alert-success" style="display: none;">Se añadió correctamente</div>
          <form action="{{route('actividad.store')}}" method="POST" onsubmit="showLoader(); setTimeout(hideLoader, 7000); showMessage();">
          @csrf
          <input type="hidden" name="_token" value="{{csrf_token()}}"> 
            <div class="mb-3">
        <label class="form-label">Codigo_Producto_SIN</label>
        <input type="number" class="form-control"  name="Codigo_Producto_SIN" id="p_codigo"> 
      </div>
      <div class="mb-3">
        <label class="form-label">Codigo_Actividad_CAEB</label>
        <input type="number" class="form-control" name="Codigo_Actividad_CAEB" id="p_actividad">
      </div>
      <div class="mb-3">
        <label class="form-label">Descripcion_o_producto_SIN</label>
        <input type="text" class="form-control"  name="Descripcion_o_producto_SIN" id="p_descripcion">
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3">
                <br>
                <button type="button" id="bt_agregar" class="btn btn-primary" >Agregar</button>
            </div>
      <div class="card">
        <div class="card-body">
            <div class="row">
            <div>
                <br>
            <table class="coso">
                <thead class="table-primary table-bordered border-primary">
                    <tr>
                        <th>Eliminar</th>
                        <th>Codigo_Producto_SIN</th>
                        <th>Codigo_Actividad_CAEB</th>
                        <th>Descripcion_o_producto_SIN</th>
                    </tr>
               </thead>
                <tbody id="tabla_body">
    
               </tbody>
            </table>
            </div>
            </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary form-control">Añadir</button>
    </form>
          </div>
        </div>
      </div>
    </div>
            <div class="col-12 col-md-12 justify-content-center">
            <table class="table table-striped table-bordered table-hover">
      <thead class="bg-primary text-white">
        <tr>
          <br>
          <th>Codigo_Producto_SIN</th>
          <th>Codigo_Actividad_CAEB</th>
          <th>Descripcion o producto</th>
          <th>Operaciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($actividades as $actividades)
        <tr>
          <td>{{$actividades->Codigo_Producto_SIN }}</td>
          <td>{{$actividades->Codigo_Actividad_CAEB}}</td>
          <td>{{$actividades->Descripcion_o_producto_SIN}}</td>
          <td>
          <form action="{{route('actividad.destroy', $actividades->id)}}" method="POST" style="display:inline;">
            @csrf
            {{method_field('DELETE')}}
        <button class="btn border-0" type="submit" value="Eliminar" onclick="return EliminarActividad('Eliminar Actividad')"><i class="fa-solid fa-trash"></i></a></button></form>
          <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-pen-to-square" ></i></a>
          <a href="" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
          </td>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <font align="center"><h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1></font>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form action="{{route('actividad.update', $actividades->id)}}" method="POST">
          @csrf
            {{method_field('PUT')}}
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Codigo Producto SIN</label>
        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Codigo_Producto_SIN" value="{{$actividades->Codigo_Producto_SIN}}">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Codigo Producto CAEB</label>
        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Codigo_Actividad_CAEB" value="{{$actividades->Codigo_Actividad_CAEB}}">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Descripcion o producto</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Descripcion_o_producto_SIN" value="{{$actividades->Descripcion_o_producto_SIN}}">
      </div>
      <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
          </div>
        </div>
      </div>
    </div>
      <!---->
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
          </div>
        </div>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                    </div>
                </div>
            </main>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
  integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
      $('#bt_agregar').click(function(){
          agregar();
      });
  });

  var cont = 0;

  function agregar() {
    var codigo = parseInt($("#p_codigo").val());
    var actividad = parseInt($("#p_actividad").val());
    var descripcion = $("#p_descripcion").val();

    if (!isNaN(codigo) && codigo >= 1 && !isNaN(actividad) && actividad >= 1 && descripcion.trim() !== "") {
        var fila = '<tr class="selected" id="fila_' + cont + '"><td><button type="button" class="btn btn-danger" onclick="eliminar(event, ' + cont + ')">X</button></td><td style="visibility:collapse; display:none;"> <input type="hidden" name="indice" value="' + cont + '"></td><td><input type="number" name="Codigo_Producto_SIN[]" value="' + codigo + '"></td><td><input type="number" name="Codigo_Actividad_CAEB[]" value="' + actividad + '"></td><td><input type="text" name="Descripcion_o_producto_SIN[]" value="' + descripcion + '"></td></tr>';
        cont++;
        $('#tabla_body').append(fila);
    } else {
        alert("Por favor rellene los campos faltantes");
    }
  }

  function eliminar(event, indice) {
    event.preventDefault();  // Evita el comportamiento predeterminado del botón
    $("#fila_" + indice).remove();
  }
</script>
@endsection