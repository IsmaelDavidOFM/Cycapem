<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('employees.list', compact('users'));
    }
    //get
    public function toList(){
        $users=DB::table('users')->get();
        return view('/employees/list')->with('users',$users);
    }

    //get
    public function toCreate(){
        return view('/employees/form');
    }

    //post
    public function toSave(Request $request){
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:32',
            'apellido' => 'required|string|max:32',
            'fecha_nacimiento' => 'required|',
            'email' => 'required|',
            'verificar_email' => 'required|email:rcf,dns',
            'contrasena' => 'required',
            'telefono' => 'required|string|max:128',
            'Red_social' => 'required|string|max:128',
            'direccion' => 'required|string|max:32',
            'picture_usuario' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status_usuario' => 'required|string|max:32',
        ]);

        if ($request->hasFile('picture_usuario')) {
            $imageName = time() . '.' . $request->picture_usuario->extension();
            $request->picture_usuario->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }

        $user= new User();
        $user->name = $request->input('nombre');
        $user->last_name = $request->input('apellido');
        $user->birthdate = $request->input('fecha_nacimiento');
        $user->email= $request->input('email');
        $user->email_verified_at = $request->input('verificar_email');
        $user->password = Hash::make($request->input('contrasena'));
        $user->phone = $request->input('telefono');
        $user->social_network = $request->input('Red_social');
        $user->addess = $request->input('direccion');
        $user->picture = $imageName;
        $user->status = $request->input('status_usuario');
        $user->created_at =1;
        $user->update_at =1;
        $user->save();

        return redirect()->back()->with('success', 'Usuario registrado exitosamente.');

    }

    //get
    public function toEdit($id)
    {
        $user= User::findOrFail($id);
        return view('employees.edit', compact('user'));
    }

    //Update
    public function toUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'email' => 'required|email|unique:customers,email,' . $id,
            'telefono' => 'required|string|max:15',
            'direccion' => 'required|string|max:255',
            'picture_usuario' => 'nullable|image|max:2048',
            'status_usuario' => 'required|string',
        ]);

        $user->name = $request->nombre;
        $user->last_name = $request->apellido;
        $user->birthdate = $request->fecha_nacimiento;
        $user->email = $request->email;
        $user->phone = $request->telefono;
        $user->address = $request->direccion;
        $user->status = $request->status_usuario;

        if ($request->hasFile('picture_usuario')) {
            $imageName = time() . '.' . $request->picture_usuario->extension();
            $request->picture_usuario->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }
        $user->picture = $imageName;
        $user->save();

        return redirect()->route('users.toList')->with('success', 'Usuario actualizado exitosamente');
    }

    //get
    public function toShow(){

    }

    //dealate
    public function toDelate($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.toList')->with('success', 'Empleado eliminado exitosamente.');
    }
}
