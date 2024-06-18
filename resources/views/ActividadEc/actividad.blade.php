
<!doctype html>
<html lang="en">
<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/2713879efc.js" crossorigin="anonymous"></script>
    
    <style>
header{
    background-color: #0461ae;
}
#sidebar, .list-group-item{
    background-color: #d3d6df;

}
.bi{
    color:#ffffff;

}
.list-group-item:hover{
    background-color:#c5cbe0;
    color:#02297e;
    text-decoration:underline
}

.sideic{
    color:#02297e;

}
.modal-content {
        overflow: hidden;
    }

    .coso {
        width: 100%;
        margin-bottom: 0;
        overflow-x: auto;
        display: block;
    }

    </style>
</head>

<body>
    <header class="py-3 ">
        <div class="container-fluid  d-flex">
            <div class="flex-shrink-1 col-md-3">
                <a href="#" class="d-block align-items-center col-lg-4 mb-2 mb-lg-0 link-dark text-decoration-none">
                    <img src="https://fiva.impuestos.gob.bo/gpri/javax.faces.resource/images/LOGO-SIAT.png.xhtml?ln=common" alt="user" >
                </a>
            </div>
            <div class="flex-shrink-1 col-md-1">
                <a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse" class=" rounded-3 p-1 text-decoration-none"><i class="bi bi-list bi-lg py-2 p-1"></i></a>
            </div>
            <div class="flex-shrink-1 offset-md-7 col-md-1 d-none d-sm-block d-xs-none">
                <a href="#"  class=" rounded-3 p-1 text-decoration-none"><i class="bi bi-bell"></i></a>
            </div>
            <div class="flex-shrink-1 col-md-1 d-none d-sm-block d-xs-none">
                <a href="#"  class=" rounded-3 p-1 text-decoration-none"><i class="bi bi-megaphone"></i></a>
            </div>
            <div class="flex-grow-1 d-flex align-items-right col-md-2 d-none d-sm-block d-xs-none">
                <div class="flex-shrink-0 dropdown">
                    <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://via.placeholder.com/28?text=!" alt="user" width="32" height="32" class="rounded-circle"> Usuario
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item" href="#">Perfil</a></li>
                        <li><a class="dropdown-item" href="#">Configuración</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

  <div class="container-fluid">

    
    <div class="row flex-nowrap">
        <div class="col-auto px-0">
            <div id="sidebar" class="collapse collapse-horizontal show border-end">
              <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start min-vh-100">
                <a href="{{ route('home') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-house-door-fill"></i><span>   Menú Principal</span> </a>
                <a href="{{ route('dependencia') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-people-fill"></i><span>   Dependencia</span> </a>
                
                <a href="{{ route('tipodoc') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-people-fill"></i><span>   Tipo de documentos Personales</span> </a>
                <a href="#" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-pencil-square"></i><span>   Solicitud</span> </a>
                <a href="{{ route('cliente') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-people-fill"></i><span>   Administración de Clientes</span> </a>
                 <a href="#" data-bs-target="#collapseExample" data-bs-toggle="collapse" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-boxes"></i><span>   Administración de Productos</span> <i class="sideic bi bi-chevron-right"></i></a>
                    <div id="collapseExample" class="collapse">
                    <a href="{{ route('producto') }}" class="  list-group-item " ><i class="sideic bi bi-chevron-right"></i><i class="sideic bi bi-check2-square"></i><span>  Gestión de Productos</span> </a>
                    <a href="#" class="  list-group-item " ><i class="sideic bi bi-chevron-right"></i><i class="sideic bi bi-check2-square"></i><span>  Gestión Masiva de Productos</span> </a>
                    </div>
                <a href="#" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-calculator-fill"></i><span>   Emisión</span> </a>
                <a href="{{ route('impresion.create') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-gear-fill"></i><span>   Configuración</span> </a>
                <a href="#" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-envelope-x-fill"></i><span>   Anulación</span> </a>
                <a href="#" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-bar-chart-line-fill"></i><span>   Consultas Emisión</span> </a>
                <a href="{{route('actividad')}}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-cash-coin"></i><span> Registrar Actividad Economica </span> </a>
                <a href="{{route('unidad')}}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-rulers"></i><span> Registrar Unidad de Medida</span> </a>
                <a href="{{route('sucursal')}}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-shop"></i><span> Registrar Sucursal</span> </a>
                <a href="{{route('documentosf')}}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-file-earmark-lock"></i><span> Registrar Documento Fiscal</span> </a>
                <a href="{{route('documentos')}}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-window-dock"></i><span> Registrar Sectores de Documentos</span> </a>
              </div>
                </div>
            </div>
            <main class="col ps-md-2 pt-2">
            <div class="row">
                <div class="col-12">
                <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-md-12 col-sm-12 col-xs-12">
            <div class="border"><figure>
            <blockquote class="blockquote">
                <font align="center"><p>Listado de Productos y Servicios Asignados por su(s) Actividad(es) Economica(s)</p></font>
            </blockquote>
            </figure>
        </div>
        <br>
          <a href=""class="btn btn-success" role="button" data-bs-toggle="modal" data-bs-target="#ModalCrear">Añadir <i class="fa-regular fa-square-plus"></i></a>
        </div>
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
<img src="https://fiva.impuestos.gob.bo/gpri/javax.faces.resource/images/LOGO-SIAT.png.xhtml?ln=common" alt="user" width="32" height="32" class="rounded-circle">


  <main>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
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
    var cont=0;
    var indice=0;
    function agregar() {
    var codigo = $("#p_codigo").val();
    var actividad = $("#p_actividad").val();
    var descripcion = $("#p_descripcion").val();
    if (codigo != 0 && codigo > 0 && actividad != 0 && actividad > 0 && descripcion != "") {
        var fila = '<tr class="selected" id="fila_' + cont + '"><td><button type="button" class="btn btn-danger" onclick="eliminar(' + cont + ')">X</button></td><td style="visibility:collapse; display:none;"> <input type="hidden"  name="indice" value="' + cont + '" ></td><td><input type="number" name="Codigo_Producto_SIN[]" value="' + codigo + '"></td><td><input type="number" name="Codigo_Actividad_CAEB[]" value="' + actividad + '"></td><td><input type="text" name="Descripcion_o_producto_SIN[]" value="' + descripcion + '"></td></tr>';
        indice++;
        cont++;
        $('#tabla_body').append(fila);
    } else {
        alert("Por favor rellene los campos faltantes");
    }
}
function eliminar(indice) {
    $("#fila_" + indice).remove();
}
</script>
</body>

</html>