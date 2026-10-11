<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeFlyer extends Model
{
    protected $fillable = [
        'titulo',
        'imagen',
        'tipo_enlace',
        'enlace',
        'nueva_pestana',
        'activo',
        'orden',
    ];

    protected $casts = [
        'nueva_pestana' => 'boolean',
        'activo' => 'boolean',
    ];
}
