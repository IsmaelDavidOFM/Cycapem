<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StepController extends Controller
{
    public function showStepOne()
    {
        $categories = Categories::all();
        return view('inicio.step1', compact('categories'));// Asegúrate de que esta sea la ruta correcta a tu vista
    }
    public function registerCustomer(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'business_type' => 'required|string|max:255',
            'company' => 'required|string|max:255',
        ]);

        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->last_name = $request->input('last_name');
        $customer->email= $request->input('email');
        $customer->email_verified_at = $request->input('email');
        $customer->address = $request->input('address');
        $customer->phone = $request->input('phone');
        $customer->business_type = $request->input('business_type');
        $customer->company = $request->input('company');
        $customer->password = Hash::make($request->input('password')); // Encriptar contraseña
        $customer->save();

        // Redirige al siguiente paso o realiza la acción que desees
        return redirect()->route('formualrio')->with('Registro exitoso , inicie sesion para continuar');
    }

    public function loginCustomer(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            $customer = Auth::user();
            $request->session()->regenerate();
            return redirect()->route('step.two', ['customer_id' => $customer->id]);
        }
    }
    public function showStep2Form()
    {
        // Recuperar los datos del cliente de la sesión
        $customerData = session('customer_data');

        // Obtener categorías desde la base de datos
        $categories = Categories::all();

        // Mostrar la vista del paso 2 con los datos del cliente y las categorías
        return view('inicio.step2', compact('customerData', 'categories'));
    }
}
