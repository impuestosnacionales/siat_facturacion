
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
</head>
<body>
<main class="col ps-md-2 pt-2">
    <div class="row">
            <div class="col-12">
                <div class="container">
        <div class="row">
            <div class="col col-md-12 col-sm-12 justify-content-center">
                <font align="center"><h1>Formulario de Productos y Servicios Asignados por su(s) Actividad(es) Economica(s) </h1></font>
                <form action="{{route('actividad.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="_token" value="{{csrf_token()}}"> 
                    <br>
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
        <table class="table">
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
    var indice=1;
    function agregar(){
        var codigo=$("#p_codigo").val();
        var actividad=$("#p_actividad").val();
        var descripcion=$("#p_descripcion").val();
        if(codigo!=0 && codigo>0 && actividad!=0 && actividad>0 && descripcion!=""){
            var fila='<tr class="selected" id="fila" ><td><button type="button" class="btn btn-danger" onclick="eliminar('+cont+')">X</button></td><td> <input type="hidden"  name="indice" value="'+cont+'" /></td><td><input type="number" name="Codigo_Producto_SIN[]" value="'+codigo+'"></td><td><input type="number" name="Codigo_Actividad_CAEB[]" value="'+actividad+'"></td><td><input type="text" name="Descripcion_o_producto_SIN[]" value="'+descripcion+'"></td></tr>'
            indice++;
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