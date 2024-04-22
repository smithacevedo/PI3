<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <h4 class="text-center">BIBLIOTEC</h4>
            </div>
            <div class="row">
                <h3 class="text-center">Reporte de autores</h3>
            </div>
            <div />

            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Nacionalidad</th>
                                <th>Fecha_Nacimiento</th>
                            </thead>
                            <tbody>
                                @foreach($autor as $aut)
                                <tr>

                                    <td>{{ $aut->id }}</td>
                                    <td>{{ $aut->Nombre }}</td>
                                    <td>{{ $aut->Nacionalidad }}</td>
                                    <td>{{ $aut->Fecha_Nacimiento }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</body>