<?php

use Illuminate\support\Facades\Route;

Route::get('/saludo', function () {
    return response()->json(['mensaje' => '¡Hola desde laravel 13']);
});