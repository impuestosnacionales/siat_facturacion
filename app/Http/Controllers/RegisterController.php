<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Rol::all(); // Obtener todos los roles disponibles
        return view('auth.register', compact('roles'));
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'nit' => 'required|integer',
            'nombrers' => 'required|string|max:255',
            'id_rol' => 'required|exists:roles,id',
        ]);

        // Create the user
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->nit = $validatedData['nit'];
        $user->nombrers = $validatedData['nombrers'];
        $user->id_rol = $validatedData['id_rol'];
        $user->save();

        // Automatically log in the newly registered user (if using Laravel's default auth system)
        auth()->login($user);

        // Redirect to the home page or any desired location
        return redirect()->to('/home');
    }
}
