<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function categorias(){
        // Ejecutar la consulta para obtener las categorías
        $categories = DB::select('SELECT * FROM categories');
    
        // Devolver la vista con los datos de las categorías
        return view('categories.list', ['categories' => $categories]);
    }
    
}
