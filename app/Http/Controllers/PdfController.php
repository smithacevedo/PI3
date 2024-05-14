<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Libro;
use App\Models\Lector;
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

}