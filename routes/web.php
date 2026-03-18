<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});






//RUTA PARA MOSTRAR EL FORMULARIO DE REGISTRO
Route::get('/registro', [
    AuthController::class, 'registerForm'
])->name('registro');

Route::post('/registro', [
    AuthController::class, 'register'
])->name('registro.store');

//RUTAS PARA MOSTRAR EL FORMULARIO DE INICIO DE SESIÓN
Route::get('/acceso',[
    AuthController::class, 'loginForm'
])->name('acceso');

//Ruta para verificar el inicio de sesión
//post enviar informacion
Route::post('/acceso', [
    AuthController::class, 'login'
])->name('acceso.store');

//Ruta para cerrar sesión
//post manda informacion
Route::post('/cerrar', [
    AuthController::class, 'logout'
])->name('cerrar');

//RUTAS PARA EL ADMINSTRADOR

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-dashboard',[
        AuthController::class, 'adminDashboard'
    ])->name('admin-dashboard');
});


