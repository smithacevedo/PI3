<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('biblioTec.index'); 
            }
        }

        return back()->withErrors([
            'message' => 'El email o password es incorrecto',
        ]);
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->to('/');
    }
}
