<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransparenciaDocumento extends Model
{
    protected $table = 'transparencia_documentos';

    protected $fillable = [
        'seccion_id',
        'etiqueta',
        'url',
        'archivo',
        'orden',
    ];

    public function seccion(): BelongsTo
    {
        return $this->belongsTo(TransparenciaSeccion::class, 'seccion_id');
    }

    public function enlace(): string
    {
        if ($this->archivo) {
            return asset('transparencia_documentos/' . $this->archivo);
        }

        return $this->url ?? '#';
    }
}
