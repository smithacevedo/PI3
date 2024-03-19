<head>
    <title>Lista de libros</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>

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
