<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('queries.list', compact('orders'));
    }

    public function toList()
    {
        $orders = DB::table('orders')->get();
        return view('queries.list')->with('orders', $orders);
    }


    public function toCreate()
    {
        $customers = Customer::all(); // Obtener todos los clientes
        $categories = Categories::all(); // Obtener todos los tipos de consultoría
        return view('queries.form', compact('customers', 'categories'));
    }

    public function toSave(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|integer|exists:customers,id',
            'category_id' => 'required|integer|exists:categories,id',
            'datetime' => 'required|date',
            'status' => 'required|string|max:255',
        ]);

        // Crear la nueva orden con los datos validados
        $order = new Order();
        $order->customer_id = $validatedData['customer_id'];
        $order->category_id = $validatedData['category_id'];
        $order->fecha_solicitada = $validatedData['datetime'];
        $order->status = $validatedData['status'];
        $order->created_at = now();
        $order->updated_at = now();
        $order->save();


        return redirect()->route('orders.toList')->with('success', 'Orden creada exitosamente.');
    }

    public function toEdit($id)
    {
        // Encuentra la orden por ID
        $order = Order::findOrFail($id);
    
        // Obtén todos los clientes y categorías
        $customers = Customer::all();
        $categories = Categories::all();
    
        // Pasar los datos a la vista
        return view('queries.edit', compact('order', 'customers', 'categories'));
    }

    public function toUpdate(Request $request, $id)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'category_id' => 'required|exists:categories,id',
            'datetime' => 'required|date',
            'status' => 'required|string',
        ]);
    
        // Encontrar la orden a editar
        $order = Order::findOrFail($id);
    
        // Actualizar la orden con los nuevos datos
        $order->customer_id = $validatedData['customer_id'];
        $order->category_id = $validatedData['category_id'];
        $order->fecha_solicitada = $validatedData['datetime'];
        $order->status = $validatedData['status'];
    
        // Guardar los cambios
        $order->save();
    
        // Redireccionar al listado o a alguna vista de éxito
        return redirect()->route('orders.toList')->with('success', 'Orden actualizada correctamente.');
    }


    public function toDelate($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.toList')->with('success', 'Order deleted successfully.');
    }
}
