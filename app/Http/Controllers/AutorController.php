<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutorController extends Controller
{
    //

    public function index()
    {
        //
        $datos['autores']=Autor::paginate(5);
        return view('autor.index', $datos);
    }

}
