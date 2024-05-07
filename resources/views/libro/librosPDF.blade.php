<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIBLIOTEC</title>
    <link rel="stylesheet" href="{{ public_path('assets/vendor/css/core.css') }}">
</head>

<body>
    <!--Ajustar icono
    <div class="layout-page">

                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="../assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                    </div>

    </div>
    icono -->
    <div class="layout-container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <h4 class="text-center">BIBLIOTEC</h4>
            </div>
            <div class="row">
                <h3 class="text-center">Reporte de libros</h3>
            </div>
            <div />

            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Editorial</th>
                                <th>Año</th>
                            </thead>
                            <tbody>
                                @foreach ($libro as $lib)
                                    <tr>

                                        <td>{{ $lib->id }}</td>
                                        <td>{{ $lib->Nombre }}</td>
                                        <td>{{ $lib->Tipo }}</td>
                                        <td>{{ $lib->Editorial }}</td>
                                        <td>{{ $lib->Año }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</body>

</html>
