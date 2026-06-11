<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'producto',
        'cantidad',
        'promocion',
        'fecha_fin',
    ];

    public function proveedores()
    {
        return $this->belongsToMany(
            Proveedor::class,
            'producto_proveedor',
            'producto_id',
            'proveedor_id'
        );
    }
}
