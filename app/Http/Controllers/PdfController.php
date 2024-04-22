<?php

namespace App\Http\Controllers;

use App\Models\Autor;
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
}
