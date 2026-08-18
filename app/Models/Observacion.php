<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Observacion extends Model
{
    protected $table = 'observaciones';

    public const ESTADOS = [
        'pendiente',
        'en_progreso',
        'en_revision',
        'hecho',
        'rechazado',
    ];

    public const PRIORIDADES = ['baja', 'media', 'alta'];

    protected $fillable = [
        'area',
        'pagina',
        'carpeta_origen',
        'titulo',
        'descripcion',
        'tipo',
        'archivo_origen',
        'estado',
        'prioridad',
        'asignado_user_id',
        'fecha_limite',
        'es_duplicado',
        'duplicado_de',
        'import_id',
        'orden',
    ];

    protected $casts = [
        'es_duplicado' => 'boolean',
        'fecha_limite' => 'date',
    ];

    public function asignado(): BelongsTo
    {
        return $this->belongsTo(User::class, 'asignado_user_id');
    }

    public function duplicadoDe(): BelongsTo
    {
        return $this->belongsTo(self::class, 'duplicado_de');
    }

    public function duplicados(): HasMany
    {
        return $this->hasMany(self::class, 'duplicado_de');
    }

    public function comentarios(): HasMany
    {
        return $this->hasMany(ObservacionComentario::class)->latest();
    }
}
