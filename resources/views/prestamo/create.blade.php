@extends('layouts.main')
@section('contenido')

<head>
    <title>Crear Prestamo</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>

<form action="{{ url('/prestamo') }}" method="post" class="multa-form">
    @csrf

    <div class="form-group">
        <label for="fechaInicio">Fecha de inicio</label>
        <input type="datetime-local" name="fechaInicio" id="fechaInicio" class="form-control">
    </div>

    <div class="form-group">
        <label for="fechaFin">Fecha de fin</label>
        <input type="datetime-local" name="fechaFin" id="fechaFin" class="form-control">
    </div>

    <div class="form-group">
        <label for="idLibro">libro</label>
        <select name="idLibro" id="idLibro" class="form-control">
                @foreach ($libroId as $libro)
                    <option value="{{ $libro->id }}">{{ $libro->id }} - {{ $libro->Nombre }}</option>
                @endforeach
            </select>
    </div>

    <div class="form-group">
        <label for="numSocio">Socio</label>
        <select name="numSocio" id="numSocio" class="form-control">
                @foreach ($nombreyIdLector as $lector)
                    <option value="{{ $lector->NumSocio }}">{{ $lector->NumSocio }} - {{ $lector->Nombre }}  {{ $lector->Apellido }}</option>
                @endforeach
            </select>
    </div>

    <p></p>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <button type="button" onclick="cancelar()" class="btn btn-secondary">Cancelar</button>
</form>

<script>
    function cancelar() {
        window.location.href = "{{ url('/prestamo') }}";
    }
</script>

@endsection
