<?php

namespace App\Http\Controllers;

use App\Http\Requests\LibroFormRequest;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['libros']=Libro::paginate(5);
        return view('libro.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('libro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LibroFormRequest $request)
    {
        //
        //$datosLibro = request()->all();
        $datosLibro = request()->except('_token');
        Libro::insert($datosLibro);

        return redirect('/libro')->with('success', 'Libro creado exitosamente');

        //return response()->json($datosLibro);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $libro = Libro::findOrFail($id);
        return view('libro.edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosLibro = request()->except(['_token', '_method']);
        Libro::where('id', '=', $id)->update($datosLibro);

        return redirect('/libro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Libro::destroy($id);
        return redirect('libro');
    }
}
