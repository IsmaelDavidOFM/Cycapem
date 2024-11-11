<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuardController extends Controller
{
    public function login(Request $request)
    {
        // Valida los datos del formulario
        $credentials = $request->only('email', 'password');

        // Intenta autenticar al cliente
        if (Auth::guard('customer')->attempt($credentials)) {
            // Regenera la sesión para evitar ataques de fijación de sesión
            $request->session()->regenerate();

            // Obtén el cliente autenticado
            $customer = Auth::guard('customer')->user();

            // Redirige al paso dos con el ID del cliente
            return redirect()->route('step.two', ['customer_id' => $customer->id]);
        }

        // Si la autenticación falla, redirige de nuevo con un error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    } //
}
