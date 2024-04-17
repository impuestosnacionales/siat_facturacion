
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
                    <a href="#" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-pencil-square"></i><span>   Solicitud</span> </a>
                    <a href="#" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-people-fill"></i><span>   Administración de Clientes</span> </a>
                    <a href="{{ route('contribuyente') }}" class="list-group-item border-end-0 d-inline-block text-truncate " ><i class="sideic bi bi-check2-square"></i><span>  Contribuyentes</span> </a>

                    <a href="#" data-bs-target="#collapseExample" data-bs-toggle="collapse" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-boxes"></i><span>   Administración de Productos</span> <i class="sideic bi bi-chevron-right"></i></a>
                        <div id="collapseExample" class="collapse">
                        <a href="{{ route('producto') }}" class="  list-group-item " ><i class="sideic bi bi-chevron-right"></i><i class="sideic bi bi-check2-square"></i><span>  Gestión de Productos</span> </a>
                        <a href="#" class="  list-group-item " ><i class="sideic bi bi-chevron-right"></i><i class="sideic bi bi-check2-square"></i><span>  Gestión Masiva de Productos</span> </a>
                        </div>
                    <a href="#" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-calculator-fill"></i><span>   Emisión</span> </a>
                    <a href="#" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-gear-fill"></i><span>   Configuración</span> </a>
                    <a href="#" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-envelope-x-fill"></i><span>   Anulación</span> </a>
                    <a href="#" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="sideic bi bi-bar-chart-line-fill"></i><span>   Consultas Emisión</span> </a>
                </div>
                </div>
            </div>
            <main class="col ps-md-2 pt-2">
            <div class="row">
                <div class="col-12">
                <div class="container">
        <div class="row">
            <div class="col col-md-12 col-sm-12 justify-content-center">
                <font align="center"><h1>Formulario de Producto</h1></font>
                <a href="{{route('producto')}}" class="btn btn-primary" role="button">Lista de productos</a>
                <form action="{{route('producto.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="_token" value="{{csrf_token()}}"> 
                    <br>
  <div class="mb-3">
    <label class="form-label">Codigo_Producto_SIN</label>
    <input type="number" class="form-control"  name="Codigo_Producto_SIN"> 
  </div>
  <div class="mb-3">
    <label class="form-label">Codigo_Actividad_CAEB</label>
    <input type="number" class="form-control" id="exampleInputPassword1"  name="Codigo_Actividad_CAEB">
  </div>
  <div class="mb-3">
    <label class="form-label">Descripcion_o_producto_SIN</label>
    <input type="text" class="form-control"  name="Descripcion_o_producto_SIN">
  </div>
  <div class="card">
    <div class="card-body">
        <div class="row">
        <div class="col-3 col-mb-3 col-sm-3">
            <label>Contribuyente</label>
            <select class="form-select" name="id_contribuyente" id="pid_contribuyente" aria-label="Default select example">
            @foreach($contribuyente as $contr)
                 <option value="{{$contr->id}}">{{$contr->Descripcion_Producto_Contribuyente}}</option>
                 @endforeach
            </select>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <label>Precio</label>
            <input type="number" class="form-control"  placeholder="Añade el precio" name="p_precio" id="p_precio">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <label>Tarifa</label>
            <input type="number" class="form-control"  placeholder="Añade la tarifa" name="p_tarifa" id="p_tarifa">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <br>
            <button type="button" id="bt_agregar" class="btn btn-primary" >Agregar</button>
        </div>
        <div>
            <br>
        <table class="table">
            <thead class="table-primary table-bordered border-primary">
                <tr>
                    <th>Opciones</th>
                    <th>Nombre del Contribuyente</th>
                    <th>Precio</th>
                    <th>Tarifa</th>
                    <th>Total</th>
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
    function agregar(){
        var id_contribuyente=$("#pid_contribuyente").val();
        var precio=$("#p_precio").val();
        var tarifa=$("#p_tarifa").val();
        
       
        var hola=$("#pid_contribuyente option:selected").text();
        
   
    
        if(precio!=0 && precio>0 && tarifa!=0 && tarifa>0){
           
    
            var fila='<tr class="selected" id="fila"><td><button type="button" class="btn btn-danger" onclick="eliminar('+cont+')">X</button></td><td><input type="hidden"  value="'+id_contribuyente+'">'+hola+'</td><td><input type="number" name="precio[]" value="'+precio+'"></td><td><input type="number" name="tarifa[]" value="'+tarifa+'"></td><td>'+precio*tarifa+'</td></tr>'
            cont++;
            $('#tabla_body').append(fila);
        }else{
            alert("Porfavor rellenar los campos faltantes")
        }
        
    }
    function eliminar(){
        $("#fila").remove();
    }
</script>
</body>

</html>