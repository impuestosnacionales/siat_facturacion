@extends('base')
@section('name')
    Reporte de Facturas de compra y venta
@endsection
@section('content')
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