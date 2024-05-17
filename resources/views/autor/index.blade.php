@extends('layouts.main')
@section('contenido')

    <head>
        <title>Lista de Autores</title>
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    </head>

    <div>
        <a href="{{ url('imprimirAutores') }}" class="pull-right">
            <button class="btn btn-primary">Imprimir Pdf</button> </a>
        <br><br />
    </div>
    <table class="book-table">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Nacionalidad</th>
                <th>Fecha_Nacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($autores as $autor)
                <tr>

                    <td>{{ $autor->id }}</td>
                    <td>{{ $autor->Nombre }}</td>
                    <td>{{ $autor->Nacionalidad }}</td>
                    <td>{{ $autor->Fecha_Nacimiento }}</td>
                    <td>
                        <button class="btn btn-primary"
                            onclick="window.location='{{ url('/autor/' . $autor->id . '/edit') }}'">Editar</button>
                        <form action="{{ url('/autor/' . $autor->id) }}" method="post" style="display: inline-block;">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input class="btn btn-primary" type="submit"
                                onclick="return confirm('¿Seguro que quieres eliminar este autor?')" value="Borrar">
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
            @if ($autores->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $autores->previousPageUrl() }}" rel="prev">&laquo;</a>
                </li>
            @endif

            {{-- Números de página --}}
            @foreach ($autores->getUrlRange(1, $autores->lastPage()) as $page => $url)
                <li class="page-item {{ $autores->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            {{-- Botón "Siguiente" --}}
            @if ($autores->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $autores->nextPageUrl() }}" rel="next">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endsection
