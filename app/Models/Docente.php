<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Docente extends Model
{
    protected $table = 'docentes';

    protected $fillable = [
        'nombre',
        'tags',
        'correo',
        'departamento',
        'descripcion',
        'linkedin',
        'imagen',
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public function carreras(): BelongsToMany
    {
        return $this->belongsToMany(Carrera::class, 'carrera_docente', 'docente_id', 'carrera_id');
    }
}
