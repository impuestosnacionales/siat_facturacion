@extends('base')
@section('name')
    Facturas de compra y venta
@endsection
@section('content')
<form action="{{ route('factura.store') }}" method="POST">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" role="form">

    <div class="card p-4 shadow-sm mb-4">
        <h4 class="text-center">Datos de la Transacción Comercial</h4>
        <hr>
        <div class="row">
            <div class="col-12 mb-3">
                <label for="id_sucursal" class="form-label">Dato de la Sucursal:</label>
                <select class="form-select" name="id_sucursal" id="id_sucursal">
                    @foreach ($sucursal as $sucursal)
                        <option value="{{ $sucursal->id }}">{{ $sucursal->Nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mb-3">
                <label for="id_actividad" class="form-label">Actividad:</label>
                <select class="form-select" name="id_actividad" id="id_actividad">
                    @foreach ($actividad as $actividad)
                        <option value="{{ $actividad->id }}">{{ $actividad->Descripcion_o_producto_SIN }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label class="form-label">Casos Especiales:</label>
            <div class="d-flex">
                <div class="form-check me-3">
                    <input type="radio" class="form-check-input" id="ninguno" name="casos_esp" value="ninguno" checked>
                    <label for="ninguno" class="form-check-label">Ninguno</label>
                </div>
                <div class="form-check me-3">
                    <input type="radio" class="form-check-input" id="99001" name="casos_esp" value="99001">
                    <label for="99001" class="form-check-label">99001 (Extranjero no inscrito)</label>
                </div>
                <div class="form-check me-3">
                    <input type="radio" class="form-check-input" id="99002" name="casos_esp" value="99002">
                    <label for="99002" class="form-check-label">99002 (Control Tributario)</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="99003" name="casos_esp" value="99003">
                    <label for="99003" class="form-check-label">99003 (Ventas Menores)</label>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="id_tipodoc" class="form-label">Tipo Documento:</label>
                <select class="form-select" name="id_tipodoc" id="id_tipodoc">
                    @foreach ($tipodoc as $tipodoc)
                        <option value="{{ $tipodoc->id }}">{{ $tipodoc->Nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="id_user" class="form-label">N° Documento/NIT:</label>
                <select class="form-select" name="id_user" id="id_user">
                    @foreach ($user as $user)
                        <option value="{{ $user->id }}">{{ $user->nit }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" name="fecha" class="form-control" id="fecha">
            </div>
        </div>
    </div>

    <div class="card p-4 shadow-sm">
        <h4 class="text-center">Detalle de la Transacción Comercial</h4>
        <hr>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="pid_producto" class="form-label">Código/Descripción:</label>
                <select class="form-select" name="pid_producto" id="pid_producto">
                    @foreach ($producto as $producto)
                        <option value="{{ $producto->id }}" data-precio="{{ $producto->precio }}" data-unidad_id="{{ $producto->unidad_nombre }}">
                            {{ $producto->cod_pcontribuyente }} - {{ $producto->desc_pcontribuyente }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="pcantidad" class="form-label">Cantidad:</label>
                <input type="number" id="pcantidad" class="form-control" placeholder="0.0000">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="pdesc_ad" class="form-label">Descripción Adicional:</label>
                <input type="text" id="pdesc_ad" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="pdescuento" class="form-label">Descuento (Bs):</label>
                <input type="number" id="pdescuento" class="form-control" placeholder="0.0000">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Precio Unitario:</label>
                <span id="ppreciou" class="d-block">0.00</span>
            </div>
            <div class="col-md-6">
                <label class="form-label">Unidad Medida:</label>
                <span id="punidad" class="d-block">Unidad</span>
            </div>
        </div>

        <div class="row justify-content-end mb-3">
            <div class="col-auto">
                <button type="button" class="btn btn-primary" id="bt_agregar">
                    <i class="fa-solid fa-cart-shopping"></i> <span>Adicionar</span>
                </button>
            </div>
        </div>

        <table class="table table-bordered">
            <thead class="table-success">
                <tr>
                    <th>Operaciones</th>
                    <th>Código/Descripción</th>
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
        <div class="row justify-content-end">
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i> <span>Emitir</span>
                </button>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-warning" id="bt_limpiar">
                    <i class="fa-solid fa-eraser" style="margin-right: 5px;"></i> <span>Limpiar</span>
                </button>
            </div>
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

        // Limpiar los campos de detalle de transacción comercial al hacer clic en el botón "Limpiar"
        $('#bt_limpiar').click(function(){
            limpiarFormulario();
        });
    });

    var cont = 0;
    function agregar() {
        var id_producto = $("#pid_producto").val();
        var cantidad = $("#pcantidad").val();
        var descuento = $('#pdescuento').val();
        var desc_ad = $('#pdesc_ad').val();

        var preciou = $("#pid_producto option:selected").data('precio');
        var unidadm = $("#pid_producto option:selected").data('unidad_id');
        var nombre = $("#pid_producto option:selected").text();

        if (cantidad != "" && cantidad > 0 && descuento != "" && descuento > 0 && desc_ad != "") {
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
                        <input type="hidden" name="cantidad[]" value="${cantidad}">
                        ${cantidad}
                    </td>
                    <td>${unidadm}</td>
                    <td>
                        <input type="hidden" name="preciou[]" value="${preciou}">
                        ${preciou}
                    </td>
                    <td>
                        <input type="hidden" name="descuento[]" value="${descuento}">
                        ${descuento}
                    </td>
                    <td>
                        ${(cantidad * preciou) - descuento}
                    </td>
                </tr>
            `;
            cont++;
            $('#tablita').append(fila);
            limpiarFormulario();
        } else {
            alert("Faltan campos por llenar");
        }
    }

    function eliminar(index) {
        $("#fila" + index).remove();
    }

    function limpiarFormulario() {
        // Reinicia los campos del detalle de la transacción comercial
        $('#pid_producto').val('');
        $('#pcantidad').val('');
        $('#pdesc_ad').val('');
        $('#pdescuento').val('');
        $('#ppreciou').text('0.00');
        $('#punidad').text('Unidad');
        $('#tablita').empty();  // Limpia la tabla
    }
</script>
@endsection
