<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Carga las traducciones desde la carpeta especificada
        $this->loadTranslationsFrom(public_path('NovaPag/languages'), 'custom');

        // Establece el idioma de la aplicación basado en la sesión
        $lang = session('app_language', 'es'); // Por defecto en español
        App::setLocale($lang);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        // Registra tus servicios aquí
    }
}
