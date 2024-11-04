<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Muestra el formulario de inicio de sesión
    public function showLoginForm()
    {

        $filePath = resource_path('views/auth/login.php');
        
        if (file_exists($filePath)) {
            return View::file($filePath);
        } else {
            abort(404, 'Login file not found at path: ' . $filePath);
        }
    }

    // Procesa la solicitud de inicio de sesión
    public function login(Request $request)
    {
        // Valida los datos de entrada
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intenta iniciar sesión
        if (Auth::attempt($credentials)) {
            // Si la autenticación es exitosa, redirige al usuario
            return redirect()->intended('dashboard');
        }

        // Si las credenciales son incorrectas, redirige de nuevo con un error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }

    // Procesa el cierre de sesión
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/'); // Redirige después de cerrar sesión
    }
}
