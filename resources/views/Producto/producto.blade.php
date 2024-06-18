@extends('base')
@section('name1')
    Facturación Porta Web en Línea - Gestión de Productos/Servicios
@endsection
@section('name')
    Listado de Productos/Servicios habilitados a su NIT
@endsection
@section('content')
    <a href="{{ route('producto.create') }}" class="btn btn-success" role="button">Añadir <i class="bi bi-plus-square"></i></a>
    <hr>
    <table id="tab" class="table ">
        <tr>
            <th>N°</th>
            <th>Código Producto SIN</th>
            <th>Código Actividad CAEB</th>
            <th>Descripción Producto SIN</th>
            <th>Código Producto Contribuyente</th>
            <th>Descripción Producto Contribuyente</th>
            <th>Precio</th>
            <th>Unidad de Medida</th>
        </tr>
        @foreach ($producto as $producto)
        <tr>
            <td>{{ $producto->id}}</td>
            <td>{{ $producto->sin}}</td>
            <td>{{ $producto->caeb}}</td>
            <td>{{ $producto->descp}}</td>
            <td>{{ $producto->cod_pcontribuyente}}</td>
            <td>{{ $producto->desc_pcontribuyente}}</td>
            <td>{{ $producto->precio}}</td>
            <td>{{ $producto->unidad}}</td>
        </tr>
        @endforeach
    </table>
@endsection
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
</body>

</html>
