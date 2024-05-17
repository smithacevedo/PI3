@extends('layouts.main')
@section('contenido')

    <!-- Mensajes de errores -->
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- -->

    <head>
        <title>Crear Autor</title>
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    </head>


    <!-- Formulario de creación de Autores -->
    <form action="{{ url('/autor') }}" method="post" class="book-form">
        @csrf
        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" name="Nombre" id="Nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Nacionalidad">Nacionalidad</label>
            <input type="text" name="Nacionalidad" id="Nacionalidad" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Fecha_Nacimiento">Fecha_Nacimiento</label>
            <input type="date" name="Fecha_Nacimiento" id="Fecha_Nacimiento" class="form-control" required>
        </div>


        <p></p>
        <input type="submit" value="Guardar datos" class="btn btn-primary">
        <button type="button" onclick="cancelar()" class="btn btn-secondary">Cancelar</button>
    </form>

    <!-- Lógica para cancelar edit -->
    <script>
        function cancelar() {
            window.location.href = "{{ url('/autor') }}";
        }
    </script>
@endsection
