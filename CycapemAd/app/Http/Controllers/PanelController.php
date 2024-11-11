<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Asegúrate de que estos modelos existan
use App\Models\User;
use App\Models\Customer;
use App\Models\Order;

class PanelController extends Controller
{
    public function index()
    {
        $totalUsuarios = User::count();
        $totalClientes = Customer::count();
        $totalOrdenes = Order::count();

        // Obtener los clientes registrados recientemente
        $recentCustomers = Customer::orderBy('created_at', 'desc')->limit(5)->get();

        // Obtener las órdenes recientes
        $recentOrders = Order::orderBy('created_at', 'desc')->limit(5)->get();

        return view('inicio.panel', compact('totalUsuarios', 'totalClientes', 'totalOrdenes', 'recentCustomers', 'recentOrders'));
    }
}

