<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Especifica los campos que se pueden asignar masivamente
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
    ];

    // Opcional: si quisieras campos que no pueden ser asignados masivamente, usarías $guarded = [];
    // protected $guarded = []; // Deja este vacío si quieres que todos los campos sean fillable por defecto excepto 'id' y timestamps
}