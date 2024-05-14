@extends('layouts.main')
@section('contenido')

<head>
    <title>Lista de lectores</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>

<div>
    <a href="{{url('imprimirLectores')}}" class="pull-right">
        <button class="btn btn-primary">Imprimir Pdf</button>
    </a>
    <br><br />
</div>
<table class="lector-table">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Número de Socio</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($lectores as $lector)
        <tr>
            <td>{{ $lector->id }}</td>
            <td>{{ $lector->NumSocio }}</td>
            <td>{{ $lector->Nombre }}</td>
            <td>{{ $lector->Apellido }}</td>
            <td>{{ $lector->Direccion }}</td>
            <td>
                <button class="btn btn-primary" onclick="window.location='{{ url('/lector/'.$lector->NumSocio.'/edit')}}'">Editar</button>
                <form action="{{ url('/lector/'.$lector->NumSocio) }}" method="post" style="display: inline-block;">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-primary" type="submit" onclick="return confirm('¿Seguro que quieres eliminar este lector?')" value="Borrar">
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
        @if ($lectores->onFirstPage())
        <li class="page-item disabled">
            <span class="page-link">&laquo;</span>
        </li>
        @else
        <li class="page-item">
            <a class="page-link" href="{{ $lectores->previousPageUrl() }}" rel="prev">&laquo;</a>
        </li>
        @endif

        {{-- Números de página --}}
        @foreach ($lectores->getUrlRange(1, $lectores->lastPage()) as $page => $url)
        <li class="page-item {{ ($lectores->currentPage() == $page) ? 'active' : '' }}">
            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
        </li>
        @endforeach

        {{-- Botón "Siguiente" --}}
        @if ($lectores->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $lectores->nextPageUrl() }}" rel="next">&raquo;</a>
        </li>
        @else
        <li class="page-item disabled">
            <span class="page-link">&raquo;</span>
        </li>
        @endif
    </ul>
</nav>

@endsection