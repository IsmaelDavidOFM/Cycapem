<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterUserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('inicio.registro');
    }

    public function toSave(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:32',
            'email' => 'required|',
            'password' => 'required',

        ]);


        $user = new User();
        $user->name = $request->input('name');
        $user->email= $request->input('email');
        $user->email_verified_at = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->last_name = 'Apellido por defecto'; // Valor predeterminado
        $user->birthdate = now(); // Ejemplo de valor predeterminado
        $user->phone = '0000000000'; // Valor predeterminado
        $user->social_network = 'N/A'; // Valor predeterminado
        $user->address = 'defecto'; // Valor predeterminado
        $user->picture = 'Default.jpg'; // Valor predeterminado
        $user->status = 'activo'; // Valor predeterminado
        $user->created_at = now(); // Fecha de creación actual
        $user->updated_at = now(); // Fecha de actualización actual
        $user->save();

        return redirect()->route('auth.register')->with('success', 'Registro exitoso, ahora puede iniciar sesión.');
    }
}

