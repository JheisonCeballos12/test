<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// 1️⃣ — Cuando se inicia el servidor (ruta raíz), redirige al login
Route::get('/', function () {
    return redirect()->route('login');
});

// 2️⃣ — Ruta para mostrar el formulario de login
Route::get('login', function () {
    return view('login');
})->name('login')->middleware('guest'); // 'guest' impide que usuarios logueados entren al login

// 3️⃣ — Dashboard protegido (solo entra si está logueado)
Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

// 4️⃣ — Página de clientes, también protegida
Route::get('clientes', function () {
    return view('clientes');
})->name('clientes')->middleware('auth');

//----------------------------------------------------------------------------------

// 5️⃣ — Iniciar sesión
Route::post('log-in', [AuthController::class, 'log_in'])->name('log-in');

// 6️⃣ — Cerrar sesión
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

//----------------------------------------------------------------------------------

// API para Vue
Route::get('/clientes', [ClienteController::class, 'index']);
Route::post('/clientes', [ClienteController::class, 'store']);
Route::put('/clientes/{id}', [ClienteController::class, 'update']);
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);

Route::get('/planes', [PlanController::class, 'index']);
Route::post('/planes', [PlanController::class, 'store']);
Route::put('/planes/{id}', [PlanController::class, 'update']);
Route::delete('/planes/{id}', [PlanController::class, 'destroy']);

// Ventas
Route::post('/ventas', [VentaController::class, 'store']); // registrar venta



