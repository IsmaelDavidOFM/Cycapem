<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class RegisterCustomerController extends Controller
{

    public function showRegistrationForm()
    {
        return view('inicio.sesion'); // Asegúrate de que la vista esté en la carpeta correcta
    }

    public function toSave(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:32',
            'apellido' => 'required|string|max:32',
            'email' => 'required|',
            'verificar_email' => 'required|email:rcf,dns',
            'domicilio' => 'required|string|max:255',
            'telefono' => 'required|string|max:128',
            'tipo_negocio' => 'required|string|max:128',
            'empresa' => 'required|string|max:128',
            'password' => 'required|string|min:8',
        ]);

        $customer = new Customer();
        $customer->name = $request->input('nombre');
        $customer->last_name = $request->input('apellido');
        $customer->email= $request->input('email');
        $customer->email_verified_at = $request->input('verificar_email');
        $customer->address = $request->input('domicilio');
        $customer->phone = $request->input('telefono');
        $customer->business_type = $request->input('tipo_negocio');
        $customer->company = $request->input('empresa');
        $customer->password = Hash::make($request->input('password')); // Encriptar contraseña
        $customer->save();

        return redirect()->back()->with('success', 'Cliente registrado exitosamente.');
    }
}
