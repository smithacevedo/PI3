<?php

namespace App\Http\Controllers;

use App\Http\Requests\LectorFormRequest;
use App\Models\Lector;
use Illuminate\Http\Request;

class LectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lectores = Lector::paginate(5);
        return view('lector.index', compact('lectores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('lector.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LectorFormRequest $request)
    {
        //
        //$datosLector = request()->all();
        $datosLector = request()->except('_token');
        Lector::insert($datosLector);

        return redirect('/lector');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lector  $lector
     * @return \Illuminate\Http\Response
     */
    public function show(Lector $lector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lector  $Lector
     * @return \Illuminate\Http\Response
     */
    public function edit($numSocio)
    {
        //
        $lector = Lector::where('NumSocio', $numSocio)->firstOrFail();
        return view('lector.edit', compact('lector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lector  $lector
     * @return \Illuminate\Http\Response
     */
    public function update(LectorFormRequest $request, $numSocio)
    {
        //
        $datosLector = request()->except(['_token', '_method']);
        Lector::where('NumSocio', $numSocio)->update($datosLector);

        return redirect('/lector');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lector  $lector
     * @return \Illuminate\Http\Response
     */
    public function destroy($numSocio)
    {
        //
        $lector = Lector::where('NumSocio', $numSocio)->firstOrFail();
        $lector->delete();
        return redirect('lector');
    }
}
