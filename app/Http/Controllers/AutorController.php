<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['autores']=Autor::paginate(5);
        return view('autor.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('autor.create');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$datosAutor = request()->all();
        $datosAutor = request()->except('_token');
        Autor::insert($datosAutor);

        return redirect('/autor');

        //return response()->json($datosAutor);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function show(Autor $autor)
    {
        //
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Autor  $Autor
     * @return \Illuminate\Http\Response
     */
     public function edit($id) 
     {
         //
         $autor = Autor::findOrFail($id);
         return view('autor.edit', compact('autor'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosAutor = request()->except(['_token', '_method']);
        Autor::where('id', '=', $id)->update($datosAutor);

        
        return redirect('/autor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Autor::destroy($id);
        return redirect('autor');
    }
}
