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
                <h3 class="text-center">Reporte de lectores</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <th>Número de Socio</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Dirección</th>
                        </thead>
                        <tbody>
                            @foreach ($lectores as $lector)
                                <tr>
                                    <td>{{ $lector->NumSocio }}</td>
                                    <td>{{ $lector->Nombre }}</td>
                                    <td>{{ $lector->Apellido }}</td>
                                    <td>{{ $lector->Direccion }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
