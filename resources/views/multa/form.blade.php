<head>
    <title>Editar Multa</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>

<!-- Formulario de edición de multa -->
<form action="{{ url('/multa/' . $multa->id) }}" method="post" class="multa-form">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="fechaInicio">Fecha de inicio</label>
        <input type="datetime-local" name="fechaInicio" id="fechaInicio" class="form-control"
            value="{{ $multa->fechaInicio }}">
    </div>

    <div class="form-group">
        <label for="fechaFin">Fecha de fin</label>
        <input type="datetime-local" name="fechaFin" id="fechaFin" class="form-control" value="{{ $multa->fechaFin }}">
    </div>

    <!-- Nuevo campo para ingresar el número de socio -->
<div class="form-group">
    <label for="numSocio">Número de Socio</label>
    <select name="numSocio" id="numSocio" class="form-control">
        @foreach ($numerosSocio as $numSocio)
            <option value="{{ $numSocio }}" {{ $multa->NumSocio == $numSocio ? 'selected' : '' }}>
                {{ $numSocio }}</option>
        @endforeach
    </select>
</div>

    <p></p>
    <input type="submit" value="Guardar cambios" class="btn btn-primary">
    <button type="button" onclick="cancelar()" class="btn btn-secondary">Cancelar</button>
</form>

<!-- Lógica para cancelar -->
<script>
    function cancelar() {
        window.location.href = "{{ url('/multa') }}";
    }
</script>
