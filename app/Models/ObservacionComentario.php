<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ObservacionComentario extends Model
{
    protected $table = 'observacion_comentarios';

    protected $fillable = [
        'observacion_id',
        'user_id',
        'comentario',
    ];

    public function observacion(): BelongsTo
    {
        return $this->belongsTo(Observacion::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
