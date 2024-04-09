@extends('layouts.main')
@section('contenido')

<head>
    <title>Lista de Autores</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>

<table class="book-table">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Nacionalidad</th>
            <th>Fecha_Nacimiento</th>
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
                <a href="{{ url('/libro/'.$libro->id.'/edit')}}">
                    Editar
                </a>
                <form action="{{ url('/libro/'.$libro->id) }}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('¿Seguro que quieres eliminar este libro?')" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
