<?php

use Illuminate\support\Facades\Route;
use App\Http\Controllers\Api\ProveedorController;
use App\Http\Controllers\Api\ProductoController;

Route::apiResource('proveedores', ProveedorController::class);
Route::apiResource('productos', ProductoController::class);

Route::get('/saludo', function () {
    return response()->json(['mensaje' => '¡Hola desde laravel 13']);
});