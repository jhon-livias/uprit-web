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
        'storage_disk',
        'orden',
    ];

    public function seccion(): BelongsTo
    {
        return $this->belongsTo(TransparenciaSeccion::class, 'seccion_id');
    }

    public function enlace(): string
    {
        if ($this->archivo && $this->storage_disk === 'local') {
            return route('transparencia.documento.publico', $this);
        }

        if ($this->archivo) {
            return asset('transparencia_documentos/' . $this->archivo);
        }

        return $this->url ?? '#';
    }
}
