<?php

namespace App\Http\Controllers;

use App\Http\Requests\MultaFormRequest;
use App\Models\Multa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Lector;

class MultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $multas = Multa::paginate(5);

        // Calcular el valor de la multa y la diferencia de días para cada multa
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

        //Condicional sino hay nombre de lectores para mostrar entonces lo omita
        if (isset($nombreyIdLector)) {
            return view('multa.index', compact('multas', 'nombreyIdLector'));
        } else {
            return view('multa.index', compact('multas'));
        }
    }

    public function create()
    {
        // Obtener todos los números de socio disponibles en la tabla de lectores
        //$numerosSocio = Lector::pluck('NumSocio');
        //return view('multa.create', compact('numerosSocio'));

        //Consulta de lectores
        $nombreyIdLector = Lector::orderBy('NumSocio', 'DESC')
            ->select('lectores.NumSocio', 'lectores.Nombre')
            ->get();

        return view('multa.create', compact('nombreyIdLector'));
    }

    public function store(MultaFormRequest $request)
    {
        $datosMulta = $request->except('_token');
        Multa::create($datosMulta);

        return redirect('/multa');
    }

    public function edit($id)
    {

        $multa = Multa::find($id);
        $numerosSocio = Lector::pluck('NumSocio');

        return view('multa.edit', compact('multa', 'numerosSocio'));
    }

    public function update(MultaFormRequest $request, $id)
    {
        // Excluir la columna 'NumSocio' de los datos que se pasan al método update()
        $datosMulta = $request->except(['_token', '_method', 'numSocio']);
        Multa::where('id', $id)->update($datosMulta);

        return redirect('/multa');
    }

    public function destroy($id)
    {
        Multa::destroy($id);
        return redirect('/multa');
    }
}
