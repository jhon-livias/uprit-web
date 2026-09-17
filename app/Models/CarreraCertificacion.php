<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarreraCertificacion extends Model
{
    protected $table = 'carrera_certificaciones';

    protected $fillable = [
        'carrera_id',
        'orden',
        'titulo',
        'nombre',
        'ciclo',
        'requisitos',
        'cursos',
        'competencias',
        'perfil_salida',
    ];

    protected $casts = [
        'cursos' => 'array',
        'competencias' => 'array',
    ];

    public function carrera(): BelongsTo
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }
}
