@extends('base')
@section('name')
    Registro y Configuración de Logo
@endsection
@section('content')
                                <form action="{{ route('impresion.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <br>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Logo Institucional</h4>
        </div>
        <div class="card-body">
            <div id="contenedorVistaPrevia" style="display: none;">
                <img id="vistaPrevia" src="#" alt="Vista previa de la imagen" style="max-width: 200px; max-height: 200px;">
            </div>
            <input type="file" id="logo" name="logo" accept="image/png, image/jpeg">
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Configuración de Impresión</h4>
        </div>
        <div class="card-body">
            <label for=""><strong>Tipos de impresión:</strong></label><br>
            <input type="radio" id="rollo" name="tipoimp" value="rollo" checked>
            <label for="rollo">En Rollo</label>
            <input type="radio" id="papel_carta" name="tipoimp" value="carta">
            <label for="papel_carta">En Papel Carta</label>
            <div>
                <input class="btn btn-primary" type="submit" value="Guardar">
            </div>
        </div>
    </div>
</form>

<!-- Script para manejar la vista previa de la imagen -->
<script>
    const inputLogo = document.getElementById('logo');
    const vistaPrevia = document.getElementById('vistaPrevia');
    const contenedorVistaPrevia = document.getElementById('contenedorVistaPrevia');

    inputLogo.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const lector = new FileReader();
            lector.onload = function(e) {
                vistaPrevia.src = e.target.result;
                contenedorVistaPrevia.style.display = 'block';
            }
            lector.readAsDataURL(this.files[0]);
        } else {
            vistaPrevia.src = '#';
            contenedorVistaPrevia.style.display = 'none';
        }
    });
</script>
@endsection

