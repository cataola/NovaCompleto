<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('miVista'); // Nombre de la vista que quieres cargar
    }
}
