<head>
    <title>Crear Autor</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>


<!-- Formulario de creación de autores -->
<form action="{{ url('/autor') }}" method="post" class="book-form">
    @csrf
    <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" value="{{ $autor->Nombre }}" id="Nombre" class="form-control">
    </div>

    <div class="form-group">
        <label for="Nacionalidad">Nacionalidad</label>
        <input type="text" name="Nacionalidad" value="{{ $autor->Nacionalidad }}" id="Nacionalidad" class="form-control">
    </div>

    <div class="form-group">
        <label for="Fecha_Nacimiento">Fecha_Nacimiento</label>
        <input type="date" name="Fecha_Nacimiento" value="{{ $autor->Fecha_Nacimiento }}" id="Fecha_Nacimiento" class="form-control">
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