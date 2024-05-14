<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Lector;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $prestamos = Prestamo::paginate(5);

    foreach ($prestamos as $prestamo) {
        $Numero_de_Socio = 
        $fechaInicio = Carbon::parse($prestamo->fechaInicio);
        $fechaFin = Carbon::parse($prestamo->fechaFin);

        $diferenciaDias = $fechaInicio->diffInDays($fechaFin);
        $valorPrestamo = $diferenciaDias * 500;

        $prestamo->diferenciaDias = $diferenciaDias;
        $prestamo->valorPrestamo = $valorPrestamo;
    }
    return view('prestamo.index', compact('prestamos'));
}


    public function create()
    {
        $numerosSocio = Lector::pluck('NumSocio');
        return view('prestamo.create', compact('numerosSocio'));
    }

    public function store(Request $request)
    {
        $datosPrestamo = $request->except('_token');
        Prestamo::create($datosPrestamo);

        return redirect('/prestamo');
    }

    public function edit($id)
    {

        $prestamo = Prestamo::find($id);
        $numerosSocio = Lector::pluck('NumSocio');

        return view('prestamo.edit', compact('prestamo', 'numerosSocio'));
    }

    public function update(Request $request, $id)
{
    $datosPrestamo = $request->except(['_token', '_method']);
    $datosPrestamo['numSocio'] = $request->input('numSocio');
    Prestamo::where('id', $id)->update($datosPrestamo);

    return redirect('/prestamo');
}


    public function destroy($id)
    {
        Prestamo::destroy($id);
        return redirect('/prestamo');
    }
}
