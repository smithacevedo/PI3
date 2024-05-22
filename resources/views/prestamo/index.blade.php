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
                    <td>{{ $prestamo->numSocio }} - {{ $lector->Nombre }}  {{ $lector->Apellido }}</td>
                    <td>{{ $libro->id }} - {{ $libro->Nombre }}</td>
                    <td>{{ $prestamo->fechaInicio }}</td>
                    <td>{{ $prestamo->fechaFin }}</td>
                    <td>{{ $prestamo->valorPrestamo}}</td>
                    <td>{{ $prestamo->diferenciaDias }}</td> 
                    <td>
                        <button class="btn btn-primary"
                            onclick="window.location='{{ url('/prestamo/' . $prestamo->id . '/edit') }}'">Editar</button>
                        <form action="{{ url('/prestamo/' . $prestamo->id) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-primary" type="submit"
                                onclick="return confirm('¿Esta prestamo ya fué pagado?')" value="Entrgado">
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
