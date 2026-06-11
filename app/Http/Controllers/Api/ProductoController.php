<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'producto' => 'required|string|max:255',
            'cantidad' => 'required|integer',
            'promocion' => 'required|boolean',

            'fecha_fin' => 'required_if:promocion,true|nullable|date',

            'proveedores' => 'required|array',
            'proveedores.*' => 'exists:proveedores,id',
        ]);

        $producto = Producto::create([
            'producto' => $datos['producto'],
            'cantidad' => $datos['cantidad'],
            'promocion' => $datos['promocion'],
            'fecha_fin' => $datos['fecha_fin'] ?? null,
        ]);

        $producto->proveedores()->sync($datos['proveedores']);

        return response()->json([
            'message' => 'Producto creado exitosamente',
            'data' => $producto->load('proveedores'),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
