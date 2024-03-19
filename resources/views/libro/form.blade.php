<head>
    <title>Crear Libro</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>


<!-- Formulario de creación de libros -->
<form action="{{ url('/libro') }}" method="post" class="book-form">
    @csrf
    <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" value="{{ $libro->Nombre }}" id="Nombre" class="form-control">
    </div>

    <div class="form-group">
        <label for="Tipo">Tipo</label>
        <input type="text" name="Tipo" value="{{ $libro->Tipo }}" id="Tipo" class="form-control">
    </div>

    <div class="form-group">
        <label for="Editorial">Editorial</label>
        <input type="text" name="Editorial" value="{{ $libro->Editorial }}" id="Editorial" class="form-control">
    </div>

    <div class="form-group">
        <label for="Año">Año</label>
        <input type="text" name="Año" value="{{ $libro->Año }}" id="Año" class="form-control">
    </div>

    <input type="submit" value="Guardar datos" class="btn btn-primary">
</form>