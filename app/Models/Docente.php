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
        'orcid',
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

    public function getRolInvestigacionLabelAttribute(): ?string
    {
        return match ($this->rol_investigacion) {
            'director' => 'Director de Investigación',
            'coordinadora' => 'Coordinadora de Control de Proyectos de Investigación',
            'docente' => 'Docente Investigador',
            default => null,
        };
    }

    public function tieneTagCoordinador(): bool
    {
        $tags = $this->tags ?? [];

        if (! is_array($tags)) {
            $tags = json_decode($tags ?: '[]', true) ?: [];
        }

        foreach ($tags as $tag) {
            if (preg_match('/coordinador/i', (string) $tag)) {
                return true;
            }
        }

        return false;
    }

    public function scopeInvestigadoresOrdenados($query)
    {
        return $query
            ->where('es_investigador', true)
            ->orderByRaw("CASE rol_investigacion WHEN 'director' THEN 1 WHEN 'coordinadora' THEN 2 ELSE 3 END")
            ->orderBy('orden_investigacion')
            ->orderBy('nombre');
    }

    public static function findInvestigadorByNombre(string $nombre): ?self
    {
        $needle = self::normalizeInvestigadorNombre($nombre);

        if ($needle === '') {
            return null;
        }

        return static::query()
            ->where('es_investigador', true)
            ->get()
            ->first(function (self $docente) use ($needle) {
                $haystack = self::normalizeInvestigadorNombre($docente->nombre);

                return $haystack === $needle
                    || str_contains($haystack, $needle)
                    || str_contains($needle, $haystack)
                    || self::apellidosInvestigador($haystack) === self::apellidosInvestigador($needle);
            });
    }

    private static function normalizeInvestigadorNombre(string $nombre): string
    {
        $nombre = trim(mb_strtolower($nombre));
        $nombre = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $nombre) ?: $nombre;
        $nombre = preg_replace('/[^a-z\s]/', '', $nombre) ?? $nombre;

        return trim(preg_replace('/\s+/', ' ', $nombre) ?? $nombre);
    }

    private static function apellidosInvestigador(string $normalized): string
    {
        $parts = array_values(array_filter(explode(' ', $normalized)));

        if (count($parts) < 2) {
            return $normalized;
        }

        return implode(' ', array_slice($parts, -2));
    }

    public function carreras(): BelongsToMany
    {
        return $this->belongsToMany(Carrera::class, 'carrera_docente', 'docente_id', 'carrera_id');
    }
}
