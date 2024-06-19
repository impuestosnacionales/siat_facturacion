@extends('base')
@section('name')
    Facturas de compra y venta
@endsection
@section('content')
<form action="{{ route('factura.store') }}" method="POST">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" role="form">
    <h3 class="text-center">Datos de la Transacción Comercial</h3>
    <hr>
    <div class="row">
        <div class="col-12 mb-3">
            <label>Dato de la Sucursal: </label>
            <select class="form-select" name="id_sucursal" id="id_sucursal">
                @foreach ($sucursal as $sucursal)
                    <option value="{{ $sucursal->id }}">{{ $sucursal->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 mb-3">
            <label>Actividad: </label>
            <select class="form-select" name="id_actividad" id="id_actividad">
                @foreach ($actividad as $actividad)
                    <option value="{{ $actividad->id }}">{{ $actividad->Descripcion_o_producto_SIN }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 mb-3">
            <label>Casos Especiales: </label>
            <input type="radio" id="ninguno" name="casos_esp" value="ninguno" checked>
            <label for="ninguno">Ninguno</label> 
            <input type="radio" id="99001" name="casos_esp" value="99001">
            <label for="99001">9901(Extranjero no inscrito)</label>
            <input type="radio" id="99002" name="casos_esp" value="99002">
            <label for="99002">99002(Control Tributario)</label>
            <input type="radio" id="99003" name="casos_esp" value="99003">
            <label for="99003">99003(Ventas Menores)</label>
        </div>
    </div>
    <div class="row">
        <div class="col-6 mb-3">
            <label>Tipo Documento: </label>
            <select class="form-select" name="id_tipodoc" id="id_tipodoc">
                @foreach ($tipodoc as $tipodoc)
                    <option value="{{ $tipodoc->id }}">{{ $tipodoc->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-6 mb-3">
            <label>N° Documento/NIT: </label>
            <select class="form-select" name="id_user" id="id_user">
                @foreach ($user as $user)
                    <option value="{{ $user->id }}">{{ $user->nit }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-6 mb-3">
            <div class="">
                <label>Fecha: </label>
                <input type="date" name="fecha" class="form-control">
            </div>
            <!--<div class="">
                <label>Cod complemento: </label>
                <input type="date" name="fecha" class="form-control">
            </div>
            <div class="">
                <label>Correo Electrónico: </label>
                <input type="date" name="fecha" class="form-control">
            </div>-->
        </div>
    </div>
    <hr>

    <h3 class="text-center">Detalle de la Transacción Comercial</h3>
    <hr>
<div class="row">
    <div class="row">
        <div class="col-6 mb-3">
            <div class=" ">
                <label>Código/Descripción: </label>
                <select class="form-select" name="pid_producto" id="pid_producto">
                    @foreach ($producto as $producto)
                        <option value="{{ $producto->id }}" data-precio="{{ $producto->precio }}" data-unidad_id="{{$producto->unidad_nombre}}">{{ $producto->cod_pcontribuyente }} - {{ $producto->desc_pcontribuyente }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6 mb-3">
            <div class=" ">
                <label>Cantidad: </label>
                <input type="number" id="pcantidad" class="form-control" placeholder="0.0000"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 mb-3">
            <div class=" ">
                <label>Descripción Adicional: </label>
                <input type="text" id="pdesc_ad" class="form-control" placeholder="" >
            </div>
        </div>
        <div class="col-6 mb-3">
            <div class="form-group">
                <label>Descuento(Bs): </label>
                <input type="number" id="pdescuento" class="form-control" placeholder="0.0000"/>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-6 mb-3">
            <div class="form-group">
                <label>Precio Unitario: </label><br>
                <label id="ppreciou"></label>
            </div>
        </div>
        <div class="col-6 mb-3">
            <div class="form-group">
                <label>Unidad Medida: </label><br>
                <label id="punidad"></label>
            </div>
        </div>
    </div>
    <div class="row justify-content-end">
    <div class="col-auto">
        <button type="button" class="btn btn-success btn-sm" id="bt_agregar">AGREGAR</button>
    </div>
</div>

</div>
    <div class="row">
        <table class="table">
            <thead class="thead-success">
                <tr>
                    <th>Operaciones</th>
                    <th>Codigo/Descripción</th>
                    <th>Cantidad</th>
                    <th>Unidad de Medida</th>
                    <th>Precio Unitario</th>
                    <th>Descuento por Producto</th>
                    <th>Subtotal por Producto</th>
                </tr>
            </thead>
            <tbody id="tablita">
                <!-- Contenido dinámico -->
            </tbody>
        </table>
        <hr>
    </div>
    <div class="row justify-content-end">
        <div class="col-auto">
            <input class="btn btn-success form-control" type="submit" value="Añadir">
        </div>
    </div>
</form>

@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function(){
        // Actualizar el label cuando se selecciona un producto
        $('#pid_producto').change(function() {
            var unida = $("#pid_producto option:selected").data('unidad_id');
            $('#punidad').text(unida);
            var prec = $("#pid_producto option:selected").data('precio');
            $('#ppreciou').text(prec);
        });
        $('#bt_agregar').click(function(){
            agregar();
        });
    });
    var cont=0;
    function agregar(){
    var id_producto = $("#pid_producto").val();
    var cantidad=$("#pcantidad").val();
    var descuento= $('#pdescuento').val();
    var desc_ad= $('#pdesc_ad').val();

    var preciou = $("#pid_producto option:selected").data('precio');
    var unidadm = $("#pid_producto option:selected").data('unidad_id');

    /*alert(preciou);
    alert(unidadm);*/
    var nombre=$("#pid_producto option:selected").text();
    //alert(nombre);
    if(cantidad!="" && cantidad>0 && descuento!="" && descuento>0 && desc_ad!=""){
        var fila = `
            <tr class="selected" id="fila${cont}">
                <td>
                    <button type="button" class="btn btn-danger" onclick="eliminar(${cont})">Eliminar</button>
                    </td>
                <td>
                    <input type="hidden" name="desc_ad[]" value="${desc_ad}">
                    <input type="hidden" name="id_producto[]" value="${id_producto}">
                    ${nombre}
                </td>
                <td>
                    <input type="number" name="cantidad[]" value="${cantidad}">
                </td>
                <td>
                    ${unidadm}
                </td>
                <td>
                    ${preciou}
                </td>
                <td>
                    <input type="number" name="descuento[]" value="${descuento}">
                </td>
                <td>
                    ${((preciou * cantidad) - descuento).toFixed(2)}
                </td>
            </tr>`;        
            cont++;
        $("#tablita").append(fila);
    } else{
        alert("Por favor rellenar los campos faltantes")
    }
}
    function eliminar(pos){
        $("#fila"+pos).remove();
    }
</script>
@endsection