<?php

use App\Http\Controllers\AutenticateController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AutenticateUserController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\OrderController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/inicio/login');
});
//login
Route::get('/login', [AutenticateUserController::class, 'acceso'])->name('inicio.acceso');
Route::post('/autenticacion', [AutenticateUserController::class, 'authenticate']);
Route::get('/salir', [AutenticateUserController::class, 'salir'])->name('auth.salir');

//Registro
Route::post('/submit-register', [RegisterUserController::class, 'toSave']);
Route::get('/register', [RegisterUserController::class, 'showRegistrationForm'])->name('auth.register');


// Rutas protegidas por middleware auth
Route::middleware('auth')->group(function () {

    // Rutas de empleados
    Route::post('/submit-empleado', [UserController::class, 'toSave']);
    Route::get('/empleados/listado', [UserController::class, 'toList'])->name('users.toList');
    Route::get('/empleados/registro', [UserController::class, 'toCreate'])->name('users.toCreate');
    Route::get('/empleados/edit/{id}', [UserController::class, 'toEdit'])->name('users.toEdit');
    Route::post('/empleados/{id}/update', [UserController::class, 'toUpdate'])->name('users.toUpdate');
    Route::delete('/empleados/{id}', [UserController::class, 'toDelate'])->name('users.toDelate');

    // Rutas de clientes
    Route::post('/submit-cliente', [CustomerController::class, 'toSave']);
    Route::get('/clientes/listado', [CustomerController::class, 'toList'])->name('customers.toList');
    Route::get('/clientes/registro', [CustomerController::class, 'toCreate'])->name('customers.toCreate');
    Route::get('/clientes/edit/{id}', [CustomerController::class, 'toEdit'])->name('customers.toEdit');
    Route::post('/clientes/{id}/update', [CustomerController::class, 'toUpdate'])->name('customers.toUpdate');
    Route::delete('/cliente/{id}', [CustomerController::class, 'toDelate'])->name('customers.toDelate');

    // Rutas de categorías/Servicios
    Route::post('/submit-categoria', [CategoriesController::class, 'toSave']);
    Route::get('/categorias/listado', [CategoriesController::class, 'toList'])->name('categories.toList');
    Route::get('/categorias/registro', [CategoriesController::class, 'toCreate'])->name('categories.toCreate');
    Route::get('/categorias/edit/{id}', [CategoriesController::class, 'toEdit'])->name('categories.toEdit');
    Route::post('/categorias/{id}/update', [CategoriesController::class, 'toUpdate'])->name('categories.toUpdate');
    Route::delete('/categorias/{id}', [CategoriesController::class, 'toDelate'])->name('categories.toDelate');

    // Rutas de ordenes
    Route::post('/submit-order', [OrderController::class, 'toSave']);
    Route::get('/order/listado', [OrderController::class, 'toList'])->name('orders.toList');
    Route::get('/order/registro', [OrderController::class, 'toCreate'])->name('orders.toCreate');
    Route::get('/order/edit/{id}', [OrderController::class, 'toEdit'])->name('orders.toEdit');
    Route::post('/order/{id}/update', [OrderController::class, 'toUpdate'])->name('orders.toUpdate');
    Route::delete('/order/{id}', [OrderController::class, 'toDelate'])->name('orders.toDelate');


    Route::get('/admin/panel', [PanelController::class, 'index'])->name('admin.panel');
    Route::get('/api/users-data', [ChartController::class, 'getUsersData']);
    Route::get('/api/customers-data', [ChartController::class, 'getCustomersData']);
    Route::get('/api/orders-data', [ChartController::class, 'getOrdersData']);
});
