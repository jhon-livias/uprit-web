<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransparenciaSeccion extends Model
{
    protected $table = 'transparencia_secciones';

    protected $fillable = [
        'titulo',
        'subtitulo',
        'icono',
        'orden',
        'abierta_por_defecto',
    ];

    protected $casts = [
        'abierta_por_defecto' => 'boolean',
    ];

    public function documentos(): HasMany
    {
        return $this->hasMany(TransparenciaDocumento::class, 'seccion_id')->orderBy('orden');
    }
}
