@extends('layouts.main')
@section('contenido')

    <head>
        <title>Lista de multas</title>
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    </head>

    <div>
        <a href="{{ url('imprimirMultas') }}" class="pull-right">
            <button class="btn btn-primary">Imprimir PDF</button>
        </a>
        <br><br />
    </div>
    <table class="multa-table">
        <thead class="thead-light">
            <tr>
                <th>Multa #</th>
                <th>Socio</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
                <th>Días retraso</th>
                <th>Valor Multa (1000 * Días retraso)</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($multas as $multa)
                <tr>
                    <td>{{ $multa->id }}</td>
                    @php
                        // Buscar el lector correspondiente al NumSocio de la multa
                        $lector = $nombreyIdLector->firstWhere('NumSocio', $multa->numSocio);
                    @endphp
                    <td>{{ $multa->numSocio }} - {{ $lector->Nombre }}</td>
                    <td>{{ $multa->fechaInicio }}</td>
                    <td>{{ $multa->fechaFin }}</td>
                    <td>{{ $multa->diferenciaDias }}</td>
                    <td>{{ $multa->valorMulta }}</td> <!-- Mostrar el valor de la multa -->
                    <td>
                        <button class="btn btn-primary"
                            onclick="window.location='{{ url('/multa/' . $multa->id . '/edit') }}'">Editar</button>
                        <form action="{{ url('/multa/' . $multa->id) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-primary" type="submit"
                                onclick="return confirm('¿Esta multa ya fué pagada?')" value="Pagada">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p></p>
    <!-- Paginación -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            {{-- Botón "Anterior" --}}
            @if ($multas->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $multas->previousPageUrl() }}" rel="prev">&laquo;</a>
                </li>
            @endif

            {{-- Números de página --}}
            @foreach ($multas->getUrlRange(1, $multas->lastPage()) as $page => $url)
                <li class="page-item {{ $multas->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            {{-- Botón "Siguiente" --}}
            @if ($multas->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $multas->nextPageUrl() }}" rel="next">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endsection
