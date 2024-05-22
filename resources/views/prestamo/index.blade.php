@extends('layouts.main')
@section('contenido')

<head>
    <title>Lista de prestamo</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>

<div>
    <a href="{{ url('imprimirprestamo') }}" class="pull-right">
        <button class="btn btn-primary">Imprimir PDF</button>
    </a>
    <br><br />
</div>
<table class="prestamo-table">
    <thead class="thead-light">
        <tr>
            <th>Prestamo #</th>
            <th>Socio</th>
            <th>Libro</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Fin</th>
            <th>Valor prestamo</th>
            <th>Dias de prestamo</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($prestamos as $prestamo)
                <tr>
                    <td>{{ $prestamo->id }}</td>
                    @php
                        $lector = $nombreyIdLector->firstWhere('NumSocio', $prestamo->numSocio);
                        $libro = $libroId->firstWhere('id', $prestamo->idLibro);

                    @endphp
                    <td>{{ $prestamo->numSocio }} - {{ $lector->Nombre }} {{ $lector->Apellido }}</td>
                    <td>{{ $libro->id }} - {{ $libro->Nombre }}</td>
                    <td>{{ $prestamo->fechaInicio }}</td>
                    <td>{{ $prestamo->fechaFin }}</td>
                    <td>{{ $prestamo->valorPrestamo}}</td>
                    <td>{{ $prestamo->diferenciaDias }}</td>
                    <td>
                        <button class="btn btn-primary"
                            onclick="window.location='{{ url('/prestamo/' . $prestamo->id . '/edit') }}'">Editar</button>
                        <form id="deleteForm" action="{{ url('/prestamo/' . $prestamo->id) }}" method="post"
                            style="display: inline-block;">
                            <input class="btn btn-primary" type="button" value="Entregado" data-toggle="modal"
                                data-target="#confirmModal">
                        </form>
                    </td>
                </tr>
                <!-- Modal de confirmación -->
                <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmModalLabel">Confirmación</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="fechaFinAcordadaModal" class="font-weight-bold">Fecha acordada de
                                        devolución:</label>
                                    <p class="form-control-plaintext" id="fechaFinAcordadaModal">{{ $prestamo->fechaFin }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="fechaFinModal" class="font-weight-bold">Fecha de devolución:</label>
                                    <input type="datetime-local" name="fechaFin" id="fechaFinModal" class="form-control">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary" id="confirmButton">Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $('#confirmButton').on('click', function () {
                            // Llamar a la función del controlador aquí (ejemplo con AJAX)
                            $.ajax({
                                url: "{{ route('multa.create') }}",
                                method: 'GET',
                                success: function (response) {
                                    // Opcionalmente, puedes hacer algo con la respuesta antes de enviar el formulario
                                    $('#deleteForm').submit();
                                },
                                error: function (xhr) {
                                    // Manejar errores
                                    console.error(xhr.responseText);
                                }
                            });
                        });
                    });
                </script>
        @endforeach
    </tbody>
</table>

<p></p>
<!-- Paginación -->
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        {{-- Botón "Anterior" --}}
        @if ($prestamos->onFirstPage()) <!-- Aquí debe ser $prestamos en lugar de $prestamo -->
            <li class="page-item disabled">
                <span class="page-link">&laquo;</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $prestamos->previousPageUrl() }}" rel="prev">&laquo;</a>
            </li>
        @endif

        {{-- Números de página --}}
        @foreach ($prestamos->getUrlRange(1, $prestamos->lastPage()) as $page => $url) <!-- Aquí también debe ser $prestamos -->
            <li class="page-item {{ $prestamos->currentPage() == $page ? 'active' : '' }}">
                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
            </li>
        @endforeach

        {{-- Botón "Siguiente" --}}
        @if ($prestamos->hasMorePages()) <!-- Aquí también debe ser $prestamos -->
            <li class="page-item">
                <a class="page-link" href="{{ $prestamos->nextPageUrl() }}" rel="next">&raquo;</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">&raquo;</span>
            </li>
        @endif
    </ul>
</nav>

@endsection