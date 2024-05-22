<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Lector;
use App\Models\Libro;
use App\Models\Multa;


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
                ->select('lectores.NumSocio', 'lectores.Nombre', 'lectores.Apellido')
                ->get();
            $prestamo->nombreyIdLector = $nombreyIdLector;

            $libroId = Libro::orderBy('id', 'DESC')->select('libros.id', 'libros.Nombre')->get();
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
            ->select('lectores.NumSocio', 'lectores.Nombre', 'lectores.Apellido')
            ->get();
        $libroId = Libro::orderBy('id', 'DESC')->select('libros.id', 'libros.Nombre')->get();

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

    public function confirmarDevolucion(Request $request, $id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $fechaDevolucion = Carbon::parse($request->input('fechaFin'));
        $fechaFin = Carbon::parse($prestamo->fechaFin);

        // Calcular la diferencia de días
        $diferenciaDias = $fechaFin->diffInDays($fechaDevolucion, false); // false para incluir negativos

        // Variable para controlar si se generó una multa
        $multaGenerada = false;

        // Si la devolución se retrasó más de 2 días
        if ($diferenciaDias > 2) {
            $valorMulta = ($diferenciaDias  - 2) * 1000; // Solo los días que se pasó
            Multa::create([
                'numSocio' => $prestamo->numSocio,
                'idLibro' => $prestamo->idLibro,
                'fechaInicio' => $prestamo->fechaInicio,
                'fechaFin' => $fechaDevolucion,
                'diferenciaDias' => $diferenciaDias,
                'valorMulta' => $valorMulta,
            ]);

            $multaGenerada = true;
        }

        // Actualizar el estado del préstamo
        $prestamo->estado = 'Devuelto';
        $prestamo->save();

        if ($multaGenerada) {
            return redirect('/prestamo')->with('success', 'Devolución confirmada. Se generó una multa porque se excedió los días del préstamo. Consulte en el módulo de multas la multa correspondiente.');
        } else {
            return redirect('/prestamo')->with('success', 'Devolución confirmada.');
        }
    }
}
