@extends('layouts.main')
@section('contenido')

<head>
    <title>Crear Libro</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>


<!-- Formulario de creación de libros -->
<form action="{{ url('/libro') }}" method="post" class="book-form">
    @csrf
    <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" id="Nombre" class="form-control">
    </div>

    <div class="form-group">
        <label for="Tipo">Tipo</label>
        <input type="text" name="Tipo" id="Tipo" class="form-control">
    </div>

    <div class="form-group">
        <label for="Editorial">Editorial</label>
        <input type="text" name="Editorial" id="Editorial" class="form-control">
    </div>

    <div class="form-group">
        <label for="Año">Año</label>
        <input type="text" name="Año" id="Año" class="form-control">
    </div>

    <p></p>

    <input type="submit" value="Guardar datos" class="btn btn-primary">
</form>
@endsection