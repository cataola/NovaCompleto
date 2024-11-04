<?php
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController; // Asegúrate de importar el controlador de sesión
use App\Http\Controllers\Controlador1;
use App\Http\Controllers\Controlador2;

// Ruta para la página de inicio: carga `indexNova.php` como página principal
Route::get('/', function () {
    return include public_path('NovaPag/indexNova.php'); // Incluye el archivo para ser procesado por PHP
});

// Ruta para el dashboard, protegida por autenticación y verificación de correo
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Ruta para el perfil del usuario, protegida por autenticación
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Rutas de autenticación (registra las rutas para login, registro, etc.)
require __DIR__.'/auth.php';

// Rutas personalizadas para inicio de sesión
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Ruta para servir otras rutas de NovaPag
Route::get('/novaPag/{any}', function () {
    return include public_path('NovaPag/indexNova.php');
})->where('any', '.*');



Route::get('/novaPag/{any}', function () {
    return include public_path('NovaPag/indexNova.php');
})->where('any', '.*');
// Ruta para el inicio de sesión
Route::get('login', function () {
    return include resource_path('views/auth/login.php'); // Cambia esto según la ubicación de tu archivo login.php
})->name('login');

// Ruta para el registro
Route::get('register', function () {
    return include resource_path('views/auth/register.php'); // Cambia esto según la ubicación de tu archivo register.php
})->name('register');

// Ruta para almacenar datos en la sesión
Route::get('/store-session', [SessionController::class, 'storeSession']); // Nueva ruta agregada

// Ruta para otra vista, asegurando que no haya duplicados
Route::get('/mi-vista', [HomeController::class, 'index']);

Route::middleware(['custom'])->group(function () {
    Route::get('/indexNova.php', [Controlador1::class, 'metodo1']);
    Route::get('/login.php', [Controlador2::class, 'metodo2']);
    Route::get('/indexNova.php', [Controlador1::class, 'metodo3']);
});

Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login.php');
