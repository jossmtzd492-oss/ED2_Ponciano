<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm(){
        return view('auth.register');
    }

    //método para guardar informaciíon en la base de datos
    public function register(Request $request){
        //recabar la informacion desde el formulario
        $request->validate([
            'name' => 'required',
            'email' => 'required|EMAIL|unique:users',
            'password' => 'required|confirmed|min:8',
            'edad' => 'required|integer',
            'turno' => 'required',
            'puesto' => 'required',
        ]);

        //Guardar la informacion de la base de datos
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'edad' => $request->edad,
            'turno' => $request->turno,
            'puesto' => $request->puesto,
            'is_Admin' => $request->has('is_Admin'),
        ]);

        //Iniciar sesión de forma automatica
        Auth::login($user);

        return redirect()->route('dulceria.index');
    }    

    //Método para regresar vista en inicio de sesión
    public function loginForm(){
        return view('auth.login');
    }

    //método para iniciar sesión
    public function login(Request $request){
        //validar los valores del formulario
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //realizar intento de inicio de sesión
        if(Auth::attempt($data)){
            //Obtener información de la sesión y generar sus credenciales
            $request -> session()->regenerate();

            //Redireccionar al usuario con su sesión iniciada
            return redirect()->route('dulceria.index'); #NO SEE
        }

        //Si los datos son incorrectos mandar un error
        return back()->withErrors([
            'email' => 'Datos incorrectos',
        ]);
    }

    //7método para cerrar sesión e invalidar las credenciales
    //request recauda infromacion
    public function logout(Request $request){
        //cerrar sesión
        Auth::logout();

        //Cierre de credenciales en las sesiones
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/acceso'); #NO SEEEE
    }

    //Método para el Panel principal del administrador
    public function adminDashboard(){
        return view('admin.dashboard');
    }    
}
