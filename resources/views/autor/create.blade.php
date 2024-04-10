@extends('layouts.main')
@section('contenido')

<head>
    <title>Crear Autor</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>


<!-- Formulario de creación de Autores -->
<form action="{{ url('/autor') }}" method="post" class="book-form">
    @csrf
    <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" id="Nombre" class="form-control">
    </div>

    <div class="form-group">
        <label for="Nacionalidad">Nacionalidad</label>
        <input type="text" name="Nacionalidad" id="Nacionalidad" class="form-control">
    </div>

    <div class="form-group">
        <label for="Fecha_Nacimiento">Fecha_Nacimiento</label>
        <input type="text" name="Fecha_Nacimiento" id="Fecha_Nacimiento" class="form-control">
    </div>


    <p></p>

    <input type="submit" value="Guardar datos" class="btn btn-primary">
</form>
@endsection