<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIBLIOTEC</title>
    <link rel="stylesheet" href="{{ public_path('assets/vendor/css/core.css') }}">
</head>

<body>
    <div class="layout-container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <h4 class="text-center">BIBLIOTEC</h4>
            </div>
            <div class="row">
                <h3 class="text-center">Registro Prestamos</h3>
            </div>
            <div />

            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>Prestamo #</th>
                                <th>Socio</th>
                                <th>FechaInicio</th>
                                <th>FechaFin</th>
                                <th>Valor</th>
                                <th>Dias Prestamo</th>
                                <th>Estado</th>
                            </thead>
                            <tbody>
                                @foreach ($prestamos as $prestamo)
                                    <tr>
                                        <td>{{ $prestamo->id }}</td>
                                        <td>{{ $prestamo->numSocio }}</td>
                                        <td>{{ $prestamo->fechaInicio }}</td>
                                        <td>{{ $prestamo->fechaFin }}</td>
                                        <td>{{ $prestamo->valorPrestamo }}</td>
                                        <td>{{ $prestamo->diferenciaDias }}</td>
                                        <td> {{ $prestamo->estado }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</body>

</html>
