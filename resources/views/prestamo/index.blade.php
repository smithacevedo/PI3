@extends('layouts.main')
@section('contenido')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Valor Prestamo</th>
                <th>Dias de Prestamo</th>
                <th>Estado</th>
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
                    <td>{{ $prestamo->valorPrestamo }}</td>
                    <td>{{ $prestamo->diferenciaDias }}</td>
                    <td>{{ $prestamo->estado }}</td>
                    <td>
                        @if ($prestamo->estado !== 'Devuelto')
                            <!-- Verificar si el estado no es 'devuelto' -->
                            <button class="btn btn-primary"
                                onclick="window.location='{{ url('/prestamo/' . $prestamo->id . '/edit') }}'">Editar</button>
                            <form id="deleteForm" action="{{ url('/prestamo/' . $prestamo->id) }}" method="post"
                                style="display: inline-block;">
                                @csrf
                                @method('POST')
                                <input class="btn btn-primary" type="button" value="Entregado" data-toggle="modal"
                                    data-target="#confirmModal{{ $prestamo->id }}">
                            </form>
                        @endif
                    </td>
                </tr>
                <!-- Modal de confirmación -->
                <div class="modal fade" id="confirmModal{{ $prestamo->id }}" tabindex="-1"
                    aria-labelledby="confirmModalLabel{{ $prestamo->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmModalLabel{{ $prestamo->id }}">Confirmación</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form action="{{ url('/prestamo/confirmar-devolucion/' . $prestamo->id) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="fechaFinAcordadaModal{{ $prestamo->id }}"
                                            class="font-weight-bold">Fecha acordada de devolución:</label>
                                        <p class="form-control-plaintext" id="fechaFinAcordadaModal{{ $prestamo->id }}">
                                            {{ $prestamo->fechaFin }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="fechaFinModal{{ $prestamo->id }}" class="font-weight-bold">Fecha de
                                            devolución:</label>
                                        <input type="datetime-local" name="fechaFin" id="fechaFinModal{{ $prestamo->id }}"
                                            class="form-control" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Confirmar Devolución</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#confirmButton').on('click', function() {
                            // Llamar a la función del controlador aquí (ejemplo con AJAX)
                            $.ajax({
                                url: "{{ route('multa.create') }}",
                                method: 'GET',
                                success: function(response) {
                                    // Opcionalmente, puedes hacer algo con la respuesta antes de enviar el formulario
                                    $('#deleteForm').submit();
                                },
                                error: function(xhr) {
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
            @if ($prestamos->onFirstPage())
                <!-- Aquí debe ser $prestamos en lugar de $prestamo -->
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $prestamos->previousPageUrl() }}" rel="prev">&laquo;</a>
                </li>
            @endif

            {{-- Números de página --}}
            @foreach ($prestamos->getUrlRange(1, $prestamos->lastPage()) as $page => $url)
                <!-- Aquí también debe ser $prestamos -->
                <li class="page-item {{ $prestamos->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            {{-- Botón "Siguiente" --}}
            @if ($prestamos->hasMorePages())
                <!-- Aquí también debe ser $prestamos -->
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
