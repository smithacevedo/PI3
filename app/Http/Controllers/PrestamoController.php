<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Lector;
use App\Models\Libro;


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
            $fechaInicio = Carbon::parse($prestamo->fechaInicio);
            $fechaFin = Carbon::parse($prestamo->fechaFin);
            $diferenciaDias = $fechaInicio->diffInDays($fechaFin);
            $valorPrestamo = $diferenciaDias * 500;
            $prestamo->diferenciaDias = $diferenciaDias;
            $prestamo->valorPrestamo = $valorPrestamo;
            $nombreyIdLector = Lector::orderBy('NumSocio', 'DESC')
                    ->select('lectores.NumSocio', 'lectores.Nombre', 'lectores.Apellido' )
                    ->get();
            $prestamo->nombreyIdLector = $nombreyIdLector;

            $libroId = Libro::orderBy('id', 'DESC') -> select('libros.id','libros.Nombre')->get();
            $prestamo->libroId = $libroId;

        }
         if (isset($nombreyIdLector)) {
                return view('prestamo.index', compact('prestamos', 'nombreyIdLector', 'libroId'));
            } else {
                return view('prestamo.index', compact('prestamos'));
            }
    }


    public function create()
    {
        $nombreyIdLector = Lector::orderBy('NumSocio', 'DESC')
        ->select('lectores.NumSocio', 'lectores.Nombre', 'lectores.Apellido' )
        ->get();
        $libroId = Libro::orderBy('id', 'DESC') -> select('libros.id','libros.Nombre')->get();

        return view('prestamo.create', compact('nombreyIdLector', 'libroId'));
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
