<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Categories;
use App\Models\Order;

class ServiceRequestController extends Controller
{
    // Mostrar el formulario del primer paso
    public function showStep1()
    {
        return view('cycapem.service-request-step1');
    }

    // Manejar el envío del primer formulario
    public function handleStep1(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'business_type' => 'required|string',
            'company' => 'required|string|max:255',
        ]);

        // Crear un nuevo cliente en la base de datos
        $customer = Customer::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'business_type' => $request->business_type,
            'company' => $request->company,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Guardar el ID del cliente en la sesión
        $request->session()->put('customer_id', $customer->id);

        // Redirigir al segundo paso
        return redirect()->route('service.request.step2');
    }

    // Mostrar el formulario del segundo paso
    public function showStep2()
    {
        $customers = Customer::all();
        $categories = Categories::all();
        return view('inicio.step2',compact('customers', 'categories'));
    }

    // Manejar el envío del segundo formulario
    public function handleStep2(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
            'fecha_solicitada' => 'required|date',
            'status' => 'required|string|max:255',
        ]);

        // Obtener el ID del cliente desde la sesión

        // Crear un nuevo pedido en la base de datos
        Order::create([
            'customer_id' =>$request->user()->id,
            'category_id' => $request->category_id,
            'fecha_solicitada' => $request->fecha_solicitada,
            'status' => $request->status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Limpiar la sesión
        $request->session()->forget('customer_id');

        // Redirigir a una página de agradecimiento o confirmación
        return redirect()->route('index')->with('success', 'Tu solicitud ha sido enviada con éxito.');
    }
}