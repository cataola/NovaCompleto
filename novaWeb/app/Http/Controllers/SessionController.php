<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    // Método para almacenar datos en la sesión
    public function storeSession(Request $request)
    {
        // Verifica si el idioma está presente en la solicitud
        if ($request->has('lang')) {
            session(['lang' => $request->input('lang')]); // Almacena el idioma en la sesión
            return response()->json(['status' => 'success']);
        }

        // Si no hay idioma en la solicitud, devuelve un error
        return response()->json(['status' => 'error', 'message' => 'Idioma no especificado'], 400);
    }
}
