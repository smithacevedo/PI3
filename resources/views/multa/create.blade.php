@extends('layouts.main')
@section('contenido')

<head>
    <title>Crear Multa</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>

<!-- Formulario de creación de multas -->
<form action="{{ url('/multa') }}" method="post" class="multa-form">
    @csrf

    <div class="form-group">
        <label for="fechaInicio">Fecha de inicio</label>
        <input type="datetime-local" name="fechaInicio" id="fechaInicio" class="form-control">
    </div>

    <div class="form-group">
        <label for="fechaFin">Fecha de fin</label>
        <input type="datetime-local" name="fechaFin" id="fechaFin" class="form-control">
    </div>

    <!-- Desplegable con los números de socio disponibles -->
    <div class="form-group">
        <label for="numSocio">Número de Socio</label>
        <select name="numSocio" id="numSocio" class="form-control">
            @foreach ($numerosSocio as $numSocio)
                <option value="{{ $numSocio }}">{{ $numSocio }}</option>
            @endforeach
        </select>
    </div>

    <p></p>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <button type="button" onclick="cancelar()" class="btn btn-secondary">Cancelar</button>
</form>

<!-- Lógica para cancelar -->
<script>
    function cancelar() {
        window.location.href = "{{ url('/multa') }}";
    }
</script>

@endsection
