<?php

require __DIR__.'/../vendor/autoload.php'; // Asegúrate de que el path sea correcto
$app = require_once __DIR__.'/../bootstrap/app.php'; // Asegúrate de que el path sea correcto

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$request = Illuminate\Http\Request::capture();

$response = $kernel->handle($request);

$response->send();

$kernel->terminate($request, $response);
