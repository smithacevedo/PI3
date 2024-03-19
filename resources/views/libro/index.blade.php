Mostrar la lista de libros :)
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Editorial</th>
            <th>Año</th>
            <th>Aciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($libros as $libro)
        <tr>
            <td>{{$libro->id}}</td>
            <td>{{$libro->Nombre}}</td>
            <td>{{$libro->Tipo}}</td>
            <td>{{$libro->Editorial}}</td>
            <td>{{$libro->Año}}</td>
            <td>Editar | Borrar</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>