<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Customer;

class AutenticateUserController extends Controller
{
    public function acceso()
    {
        return view('inicio.step1'); // Asegúrate de que la vista esté en la carpeta correcta
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Intentar autenticar como usuario
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/keepneed/catalago');
        }
        // Intentar autenticar como cliente
        elseif (Auth::guard('customer')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/keepneed/catalago');
        }

        return redirect('/keepneed/login')->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
            'password' => 'La contraseña proporcionada no coincide con nuestros registros.',
        ])->onlyInput('email');
    }

    public function salir(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/keepneed/login');
    }
}
