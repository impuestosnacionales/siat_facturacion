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
        <div class="form-group col-12 mb-3">
            <label>Dato de la Sucursal: </label>
            <select class="form-select" name="id_sucursal" id="id_sucursal">
                @foreach ($sucursal as $sucursal)
                    <option value="{{ $sucursal->id }}">{{ $sucursal->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-12 mb-3">
            <label>Actividad: </label>
            <select class="form-select" name="id_actividad" id="id_actividad">
                @foreach ($actividad as $actividad)
                    <option value="{{ $actividad->id }}">{{ $actividad->Descripcion_o_producto_SIN }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-12 mb-3">
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
            <!--<div class="form-group">
                <label>Cod complemento: </label>
                <input type="date" name="fecha" class="form-control">
            </div>
            <div class="form-group">
                <label>Correo Electrónico: </label>
                <input type="date" name="fecha" class="form-control">
            </div>-->
        </div>
    </div>
    <hr>

    <h3 class="text-center">Detalle de la Transacción Comercial</h3>
    <hr>
    <div class="row">
        <div class="col-6 mb-3">
            <div class="form-group">
                <label>Código/Descripción: </label>
                <select class="form-select" name="pid_producto" id="pid_producto">
                    @foreach ($producto as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->cod_pcontribuyente }} - {{ $producto->desc_pcontribuyente }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6 mb-3">
            <div class="form-group">
                <label>Cantidad: </label>
                <input type="number" id="pcantidad" class="form-control" placeholder="0.0000"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 mb-3">
            <div class="form-group">
                <label>Descripción Adicional: </label>
                <textarea id="pdesc_ad" class="form-control" placeholder="" style="width: 100%;" cols="20" rows="5"></textarea>
            </div>
        </div>
        <div class="col-6 mb-3">
            <div class="form-group">
                <label>Unidad Medida: </label>
                <label id="punidad"></label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 mb-3">
            <div class="form-group">
                <label>Precio Unitario: </label>
                <input type="number" id="pprecio" class="form-control" placeholder="0.0000"/>
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
        <button type="button" class="btn btn-success" id="bt_agregar">AGREGAR</button>
    </div>

    <div class="row">
        <table class="table">
            <thead class="thead-success">
                <tr>
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
        <div class="form-group row">
            <div class="col-12">
                <input class="btn btn-success form-control" type="submit" value="Añadir">
            </div>
        </div>
    </div>
</form>

<table id="tab" class="table">
    <thead>
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
    </thead>
    <tbody>
        @foreach ($factura as $factura)
        <tr>
            <td>{{ $factura->id }}</td>
            <td>{{ $factura->casos_esp }}</td>
            <td>{{ $factura->fecha }}</td>
            <td>{{ $factura->cod_auto }}</td>
            <td>{{ $factura->sucursal }}</td>
            <td>{{ $factura->actividad }}</td>
            <td>{{ $factura->tipodoc }}</td>
            <td>{{ $factura->razons }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
