@extends('layouts.main')
@section('contenido')

<head>
    <title>Lista de libros</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>

<div>
    <a href="{{url('imprimirAutores')}}" class="pull-right">
        <button class="btn btn-primary">Imprimir Pdf</button> </a>
    <br><br />
</div>
<table class="book-table">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Editorial</th>
            <th>Año</th>
            <th>Acciones</th> <!-- Corregido "Aciones" a "Acciones" -->
        </tr>
    </thead>

    <tbody>
        @foreach($libros as $libro)
        <tr>
            <td>{{ $libro->id }}</td>
            <td>{{ $libro->Nombre }}</td>
            <td>{{ $libro->Tipo }}</td>
            <td>{{ $libro->Editorial }}</td>
            <td>{{ $libro->Año }}</td>
            <td>
                <button class="btn btn-primary" onclick="window.location='{{ url('/libro/'.$libro->id.'/edit')}}'">Editar</button>
                <form action="{{ url('/libro/'.$libro->id) }}" method="post" style="display: inline-block;">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-primary" type="submit" onclick="return confirm('¿Seguro que quieres eliminar este libro?')" value="Borrar">
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
        @if ($libros->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">&laquo;</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $libros->previousPageUrl() }}" rel="prev">&laquo;</a>
            </li>
        @endif

        {{-- Números de página --}}
        @foreach ($libros->getUrlRange(1, $libros->lastPage()) as $page => $url)
            <li class="page-item {{ ($libros->currentPage() == $page) ? 'active' : '' }}">
                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
            </li>
        @endforeach

        {{-- Botón "Siguiente" --}}
        @if ($libros->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $libros->nextPageUrl() }}" rel="next">&raquo;</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">&raquo;</span>
            </li>
        @endif
    </ul>
</nav>

@endsection