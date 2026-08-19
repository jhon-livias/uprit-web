<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    public const NIVEL_PREGRADO = 3;

    public const NIVEL_PREGRADO_PUEDE = 4;

    protected $table = 'carreras';

    protected $appends = [
        'effective_brochure',
        'effective_imagen',
        'effective_imagen_banner',
        'media_heredado_de_pregrado_puede',
    ];

    protected $fillable = [
        'id',
        'categoria_id',
        'nombre',
        'descripcion',
        'admision',
        'duracion',
        'grado_obtenido',
        'titulacion',
        'modalidades',
        'brochure',
        'imagen',
        'imagen_banner',

    ];


    public function setAdmisionAttribute(mixed $value): void
    {
        if ($value === null || $value === '' || $value === 'null' || $value === 'undefined') {
            $this->attributes['admision'] = null;

            return;
        }

        $this->attributes['admision'] = $value;
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function preguntas()
    {
        return $this->hasMany(CarreraPregunta::class, 'carrera_id');
    }

    public function docentes()
    {
        return $this->belongsToMany(Docente::class, 'carrera_docente', 'carrera_id', 'docente_id');
    }

    public function malla()
    {
        return $this->hasMany(CarreraMalla::class, 'carrera_id');
    }

    public function detalle_descripcion()
    {
        return $this->hasOne(
            CarreraDescripcion::class,
            'carrera_id'
        );
    }

    public function perfilEgresado()
    {
        return $this->hasOne(
            CarreraPerfilEgresado::class,
            'carrera_id'
        );
    }

    public function isPregrado(): bool
    {
        $this->loadMissing('categoria');

        return (int) ($this->categoria?->nivel_academico_id) === self::NIVEL_PREGRADO;
    }

    public function isPregradoPuede(): bool
    {
        $this->loadMissing('categoria');

        return (int) ($this->categoria?->nivel_academico_id) === self::NIVEL_PREGRADO_PUEDE;
    }

    public function carreraPregradoPuedeEquivalente(): ?self
    {
        if (! $this->isPregrado() || empty($this->categoria?->nombre)) {
            return null;
        }

        return static::query()
            ->where('nombre', $this->nombre)
            ->whereHas('categoria', function ($query) {
                $query->where('nombre', $this->categoria->nombre)
                    ->where('nivel_academico_id', self::NIVEL_PREGRADO_PUEDE);
            })
            ->first();
    }

    public function getEffectiveBrochureAttribute(): ?string
    {
        return $this->resolveMediaField('brochure');
    }

    public function getEffectiveImagenAttribute(): ?string
    {
        return $this->resolveMediaField('imagen');
    }

    public function getEffectiveImagenBannerAttribute(): ?string
    {
        return $this->imagen_banner ?: null;
    }

    public function getMediaHeredadoDePregradoPuedeAttribute(): bool
    {
        if (! $this->isPregrado()) {
            return false;
        }

        return empty($this->brochure) || empty($this->imagen);
    }

    public function brochurePath(): ?string
    {
        $brochure = $this->effective_brochure;

        if (empty($brochure)) {
            return null;
        }

        $path = public_path('brochures_carreras/' . $brochure);

        return is_file($path) ? $path : null;
    }

    public function brochureUrl(): ?string
    {
        $brochure = $this->effective_brochure;

        if (empty($brochure)) {
            return null;
        }

        return asset('brochures_carreras/' . $brochure);
    }

    public function imagenUrl(): ?string
    {
        $imagen = $this->effective_imagen;

        if (empty($imagen)) {
            return null;
        }

        return asset('brochures_imagenes/' . $imagen);
    }

    public function imagenBannerUrl(): ?string
    {
        $imagenBanner = $this->effective_imagen_banner;

        if (empty($imagenBanner)) {
            return null;
        }

        return asset('brochures_imagenes/' . $imagenBanner);
    }

    private function resolveMediaField(string $field): ?string
    {
        if (! empty($this->{$field})) {
            return $this->{$field};
        }

        if (! in_array($field, ['imagen', 'brochure'], true) || ! $this->isPregrado()) {
            return null;
        }

        return $this->carreraPregradoPuedeEquivalente()?->{$field};
    }
}
