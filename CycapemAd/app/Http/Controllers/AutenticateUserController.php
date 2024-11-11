<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutenticateUserController extends Controller
{
    public function acceso(){
        return view('inicio.login');
    }
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt(['email'=> $request->email, 
        'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/panel');

        }
        return redirect('/login')->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'The provided credentials do not match our records.{{/n}}',
        ])->onlyInput('email','password');

        
    }
    public function salir(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
