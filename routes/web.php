<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DulceriaController;
use App\Http\Controllers\AuthController; //NUEVO 

Route::get('/', function () {
    return view('welcome');
});


//Ruta para manejar los formularios y accesos en la
Route::get('/dulceria/{id}/edit', [
    DulceriaController::class, 'edit'
])->name('dulceria.edit');

Route::put('/dulceria/{id}', [
    DulceriaController::class, 'update'
])->name('dulceria.update');

//RUTAS PARA REGISTRAR
//RUTA PARA MOSTRAR EL FORMULARIO DE REGISTRO
Route::get('/registro', [
    AuthController::class, 'registerForm'
])->name('registro');

Route::post('/registro', [
    AuthController::class, 'register'
])->name('registro.strore');

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
Route::middleware(['auth'])->group(function () {
    // ! RUTA PARA OBTENER LOS METODOS DE LIBRO CONTROLLER
    Route::resource('dulceria', DulceriaController::class);
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-dashboard',[
        AuthController::class, 'adminDashboard'
    ])->name('admin-dashboard');
    Route::resource('dulceria', DulceriaController::class);
});


