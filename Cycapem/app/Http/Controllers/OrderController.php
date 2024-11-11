<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Categories;
use App\Models\Customer;

class OrderController extends Controller
{
    public function toCreate()
    { // Obtener todos los clientes
        $categories = Categories::all();
        return view('inicio.step1', compact('categories'));
    }

    public function toSave(Request $request)
    {

        $validatedData = $request->validate([
            'customer_id' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'datetime' => 'required|date',
            'status' => 'required|string|max:255',
        ]);

        $customer = Customer::where('email', $validatedData['customer_id'])->first();
        // Crear la nueva orden con los datos validados
        $order = new Order();
        $order->customer_id = $customer->id;
        $order->category_id = $validatedData['category_id'];
        $order->fecha_solicitada = $validatedData['datetime'];
        $order->status = $validatedData['status'];
        $order->created_at = now();
        $order->updated_at = now();
        $order->save();


        return redirect()->route('index')->with('success', 'Orden creada exitosamente.');
    } //
}
