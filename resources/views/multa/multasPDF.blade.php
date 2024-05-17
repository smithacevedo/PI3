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
                <h3 class="text-center">Reporte de multas</h3>
            </div>
            <div />

            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>Multa #</th>
                                <th>Socio</th>
                                <th>Fecha de Inicio</th>
                                <th>Fecha de Fin</th>
                                <th>Días retraso</th>
                                <th>Valor Multa (500 * Días retraso)</th>
                            </thead>
                            <tbody>
                                @foreach ($multas as $multa)
                                    <tr>
                                        <td>{{ $multa->id }}</td>
                                        @php
                                            // Buscar el lector correspondiente al NumSocio de la multa
                                            $lector = $nombreyIdLector->firstWhere('NumSocio', $multa->numSocio);
                                        @endphp
                                        <td>{{ $multa->numSocio }} - {{ $lector->Nombre }}</td>
                                        <td>{{ $multa->fechaInicio }}</td>
                                        <td>{{ $multa->fechaFin }}</td>
                                        <td>{{ $multa->diferenciaDias }}</td>
                                        <td>{{ $multa->valorMulta }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</body>

</html>
