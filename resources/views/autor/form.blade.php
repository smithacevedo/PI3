<head>
    <title>Crear Autor</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>


<!-- Formulario de creación de libros -->
<form action="{{ url('/autor') }}" method="post" class="book-form">
    @csrf
    <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" value="{{ $autor->Nombre }}" id="Nombre" class="form-control">
    </div>

    <div class="form-group">
        <label for="Nacionalidad">Nacionalidad</label>
        <input type="text" name="Nacionalidad" value="{{ $autor->Tipo }}" id="Nacionalidad" class="form-control">
    </div>

    <div class="form-group">
        <label for="Fecha_Nacimineto">Fecha_Nacimineto</label>
        <input type="text" name="Fecha_Nacimineto" value="{{ $autor->Editorial }}" id="Fecha_Nacimineto" class="form-control">
    </div>
    
    <input type="submit" value="Guardar datos" class="btn btn-primary">
</form>