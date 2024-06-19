<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SessionsController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'nit' => 'required' // Nuevo campo requerido
        ]);

        $credentials = $request->only('email', 'password', 'nit');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'message' => 'Las credenciales proporcionadas no son válidas. Por favor, inténtalo de nuevo.'
        ]);
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->to('/');
    }
}
