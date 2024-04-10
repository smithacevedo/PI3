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
            <th>Acciones</th> <!-- Corregido "Aciones" a "Acciones" -->
        </tr>
    </thead>

    <tbody>
        @foreach($autores as $autor)
        <tr>
            
            <td>{{ $autor->id }}</td>
            <td>{{ $autor->Nombre }}</td>
            <td>{{ $autor->Nacionalidad }}</td>
            <td>{{ $autor->Fecha_Nacimiento }}</td>
            <td>
                <a href="{{ url('/autor/'.$autor->id.'/edit')}}">
                    Editar
                </a>
                <form action="{{ url('/autor/'.$autor->id) }}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('¿Seguro que quieres eliminar este autor?')" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
