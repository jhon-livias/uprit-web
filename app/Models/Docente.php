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
        'es_investigador',
        'orden_investigacion',
        'rol_investigacion',
        'genero',
        'titulo_academico',
        'resumen_investigacion',
    ];

    protected $casts = [
        'tags' => 'array',
        'es_investigador' => 'boolean',
    ];

    public function getNombreConTituloAttribute(): string
    {
        $nombre = trim($this->nombre);

        if (preg_match('/^(Dr\.|Dra\.|Mg\.|Lic\.|Mtra\.)\s+/iu', $nombre)) {
            return $nombre;
        }

        $titulo = trim((string) $this->titulo_academico);

        return $titulo !== '' ? "{$titulo} {$nombre}" : $nombre;
    }

    public function scopeInvestigadoresOrdenados($query)
    {
        return $query
            ->where('es_investigador', true)
            ->orderByRaw("CASE rol_investigacion WHEN 'director' THEN 1 WHEN 'coordinadora' THEN 2 ELSE 3 END")
            ->orderByRaw("CASE WHEN rol_investigacion = 'docente' THEN CASE genero WHEN 'F' THEN 0 WHEN 'M' THEN 1 ELSE 2 END ELSE 0 END")
            ->orderBy('orden_investigacion')
            ->orderBy('nombre');
    }

    public function carreras(): BelongsToMany
    {
        return $this->belongsToMany(Carrera::class, 'carrera_docente', 'docente_id', 'carrera_id');
    }
}
