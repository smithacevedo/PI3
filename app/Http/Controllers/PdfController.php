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
        $Autor = Autor::orderBy('id', 'ASC')->get();
        $pdf = \PDF::loadView('autorPDF.pdf', ['autor' => $Autor]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->stream();
    }
}
