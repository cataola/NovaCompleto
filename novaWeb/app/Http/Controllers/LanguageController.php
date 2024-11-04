<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function setLanguage(Request $request)
    {
        $lang = $request->input('lang');
        Session::put('lang', $lang);
        return response()->json(['success' => true]); // Devuelve una respuesta JSON
    }
}
