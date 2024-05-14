@extends('layouts.main')
@section('contenido')

    <head>
        <title>Crear Lector</title>
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    </head>

    <?php
    // Obtener el próximo número de socio disponible
    use App\Models\Lector;
    $ultimoSocio = Lector::orderBy('NumSocio', 'desc')->first(); // Obtener el último socio
    $proximoNumSocio = $ultimoSocio ? $ultimoSocio->NumSocio + 1 : 1; // Incrementar el último socio para obtener el próximo
    ?>



    <!-- Formulario de creación de lectores -->
    <form action="{{ url('/lector') }}" method="post" class="lector-form">
        @csrf
        <div class="form-group">
            <label for="NumSocio">Número de Socio</label>
            <input type="number" name="NumSocio" id="NumSocio" class="form-control" value="{{ $proximoNumSocio }}" readonly>
            <small class="form-text text-muted">Se genera automáticamente</small>
        </div>

        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" name="Nombre" id="Nombre" class="form-control">
        </div>

        <div class="form-group">
            <label for="Apellido">Apellido</label>
            <input type="text" name="Apellido" id="Apellido" class="form-control">
        </div>

        <div class="form-group">
            <label for="Direccion">Dirección</label>
            <input type="text" name="Direccion" id="Direccion" class="form-control">
        </div>

        <p></p>
        <input type="submit" value="Guardar datos" class="btn btn-primary">
        <button type="button" onclick="cancelar()" class="btn btn-secondary">Cancelar</button>
    </form>

    <!-- Lógica para cancelar edit -->
    <script>
        function cancelar() {
            window.location.href = "{{ url('/lector') }}";
        }
    </script>
@endsection
