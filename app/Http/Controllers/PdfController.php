<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Libro;
use App\Models\Lector;
use App\Models\Multa;
use App\Models\Prestamo;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Http\Request;
use pdf;
use App\Models\Producto;

class PdfController extends Controller
{

    public function imprimirAutor(Request $request)
    {
        $autores = Autor::orderBy('id', 'ASC')->get();
        $pdf = \PDF::loadView('autor.autoresPDF', ['autor' => $autores]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->stream();
    }

    public function imprimirLibro(Request $request)
    {
        $libros = Libro::orderBy('id', 'ASC')->get();
        $pdf = \PDF::loadView('libro.librosPDF', ['libro' => $libros]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->stream();
    }
    public function imprimirLector(Request $request)
    {
        $lectores = Lector::orderBy('NumSocio', 'ASC')->get();
        return \PDF::loadView('lector.lectoresPDF', compact('lectores'))
            ->setPaper('carta', 'A4')
            ->stream();
    }

    public function imprimirMulta(Request $request)
    {
        // Calcular el valor de la multa y la diferencia de días para cada multa
        $multas = Multa::all();
        foreach ($multas as $multa) {
            $fechaInicio = Carbon::parse($multa->fechaInicio);
            $fechaFin = Carbon::parse($multa->fechaFin);

            // Calcular la diferencia de días
            $diferenciaDias = $fechaInicio->diffInDays($fechaFin);

            // Calcular el valor de la multa
            $valorMulta = $diferenciaDias * 500;

            // Agregar la diferencia de días y el valor de la multa como propiedades a cada multa
            $multa->diferenciaDias = $diferenciaDias;
            $multa->valorMulta = $valorMulta;

            $nombreyIdLector = Lector::orderBy('NumSocio', 'DESC')
                ->select('lectores.NumSocio', 'lectores.Nombre')
                ->get();

            $multa->nombreyIdLector = $nombreyIdLector;
        }

        // Generar el PDF y pasar las multas con las variables calculadas
        $data = ['multas' => $multas];

        if (isset($nombreyIdLector)) {
            $data['nombreyIdLector'] = $nombreyIdLector;
        }

        $pdf = \PDF::loadView('multa.multasPDF', $data);

        // Establecer el tamaño del papel
        $pdf->setPaper('carta', 'A4');

        // Devolver el PDF como una respuesta
        return $pdf->stream();
    }

    public function imprimirPrestamo(Request $request)
    {
        $prestamos = Prestamo::all();
        foreach ($prestamos as $prestamo) {
            $fechaInicio = Carbon::parse($prestamo->fechaInicio);
            $fechaFin = Carbon::parse($prestamo->fechaFin);
            $diferenciaDias = $fechaInicio->diffInDays($fechaFin);
            $valorPrestamo = $diferenciaDias * 500;
            $prestamo->diferenciaDias = $diferenciaDias;
            $prestamo->valorPrestamo = $valorPrestamo;
        }
        $pdf = \PDF::loadView('prestamo.prestamoPDF', compact('prestamos'));
        $pdf->setPaper('carta', 'A4');

        return $pdf->stream();
    }
}
