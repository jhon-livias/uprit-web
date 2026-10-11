<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Noticia extends Model
{
    use SoftDeletes;

    //
    protected $table = 'noticias';

    protected $fillable = [
        'id',
        'categoria_noticia_id',
        'titulo',
        'slug',
        'fecha',
        'fecha_fin',
        'descripcion_corta',
        'imagen',
        'tags',
        'autor_nombre',
        'autor_descripcion',
        'autor_imagen',
        'descripcion_total',
        'estado',
        'enlace_externo',
        'abrir_nueva_pestana',
        
    ];

    protected $casts = [
        'tags' => 'array',
        'estado' => 'boolean',
        'abrir_nueva_pestana' => 'boolean',
    ];

    public function categoriaNoticia()
    {
        return $this->belongsTo(CategoriaNoticia::class);
    }

    protected static function booted(): void
    {
        static::saving(function (self $noticia) {
            $base = Str::slug($noticia->slug ?: $noticia->titulo) ?: 'noticia';
            $slug = $base;
            $suffix = 2;

            while (static::withTrashed()
                ->where('slug', $slug)
                ->when($noticia->exists, fn ($query) => $query->whereKeyNot($noticia->getKey()))
                ->exists()) {
                $slug = $base . '-' . $suffix++;
            }

            $noticia->slug = $slug;
        });
    }

    public function getFechaRangoAttribute(): string
    {
        $inicio = Carbon::parse($this->fecha)->locale('es');
        if (!$this->fecha_fin || $inicio->isSameDay(Carbon::parse($this->fecha_fin))) {
            return ucfirst($inicio->translatedFormat('d F, Y'));
        }

        $fin = Carbon::parse($this->fecha_fin)->locale('es');
        if ($inicio->isSameMonth($fin) && $inicio->isSameYear($fin)) {
            return $inicio->translatedFormat('d') . ' y ' . ucfirst($fin->translatedFormat('d F, Y'));
        }

        if ($inicio->isSameYear($fin)) {
            return ucfirst($inicio->translatedFormat('d F')) . ' al ' . $fin->translatedFormat('d F, Y');
        }

        return ucfirst($inicio->translatedFormat('d F, Y')) . ' al ' . $fin->translatedFormat('d F, Y');
    }
}
