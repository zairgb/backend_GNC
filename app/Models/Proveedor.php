<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    protected $fillable = [
        'proveedor',
        'telefono',
        'correo',
    ];

    public function productos()
    {
        return $this->belongsToMany(
            Producto::class,
            'producto_proveedor',
            'proveedor_id',
            'producto_id'
        );
    }
}