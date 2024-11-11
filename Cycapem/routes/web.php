<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\GuardController;
use App\Http\Controllers\AutenticateUserController;
use App\Http\Controllers\RegisterCustomerController;
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

// Ruta para la vista index
Route::get('/', function () {
    return view('cycapem.index');
})->name('index');

// Ruta para la vista contact
Route::get('/contact', function () {
    return view('cycapem.contact');
})->name('contact');

// Ruta para la vista de inicio de sesión
Route::get('/login', function () {
    return view('inicio.sesion');
})->name('login');

Route::get('/formulario', function () {
    return view('inicio.step1');
})->name('formualrio');


Route::get('/service-request/step1', [ServiceRequestController::class, 'showStep1'])->name('service.request.step1');
Route::post('/service-request/step1', [ServiceRequestController::class, 'handleStep1'])->name('service.request.step1.submit');

Route::get('/service-request/step2', [ServiceRequestController::class, 'showStep2'])->name('service.request.step2');
Route::post('/service-request/step2', [ServiceRequestController::class, 'handleStep2'])->name('service.request.step2.submit');

Route::get('/step-one', [StepController::class, 'showStepOne'])->name('step.one');
Route::get('/step-two', [StepController::class, 'showStep2Form'])->name('step.two');
Route::post('/step-one/register', [StepController::class, 'registerCustomer'])->name('step.one.register');
Route::post('/step-one/login', [StepController::class, 'loginCustomer'])->name('step.one.login');

Route::post('/login', [GuardController::class, 'login'])->name('login');
Route::get('/keepneed/login', [AutenticateUserController::class, 'acceso'])->name('inicio.acceso');
Route::post('/autenticacion', [AutenticateUserController::class, 'authenticate'])->name('step.one.login');
Route::get('/salir', [AutenticateUserController::class, 'salir'])->name('auth.salir');

// Registro de cliente

Route::post('/submit-register', [RegisterCustomerController::class, 'toSave'])->name('auth.register');
Route::get('/register', [RegisterCustomerController::class, 'showRegistrationForm'])->name('auth.register.form');

Route::get('/keepneed/login', [AutenticateUserController::class, 'acceso'])->name('auth.login');
Route::post('/autenticacion', [AutenticateUserController::class, 'authenticate'])->name('auth.authenticate');
Route::get('/salir', [AutenticateUserController::class, 'salir'])->name('auth.salir');

// Rutas de registro
Route::post('/submit-register', [RegisterCustomerController::class, 'toSave'])->name('auth.register');
Route::get('/register', [RegisterCustomerController::class, 'showRegistrationForm'])->name('auth.showRegisterForm');


Route::get('/order/registro', [OrderController::class, 'toCreate'])->name('order.toCreate');
Route::post('/submit-order', [OrderController::class, 'toSave']);