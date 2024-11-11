<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.list', compact('customers'));
    }

    // GET
    public function toList()
    {
        $customers = DB::table('customers')->get();
        return view('customers.list')->with('customers', $customers);
    }

    // GET
    public function toCreate()
    {
        return view('customers.form');
    }

    // POST
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

    // GET
    public function toEdit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    // UPDATE
    public function toUpdate(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

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

        return redirect()->route('customers.toList')->with('success', 'Cliente actualizado exitosamente');
    }

    // DELETE
    public function toDelate($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.toList')->with('success', 'Cliente eliminado exitosamente.');
    }
}