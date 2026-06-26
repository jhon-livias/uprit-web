<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarreraDescripcion extends Model
{
    //
    protected $table = 'carrera_descripcion';

    protected $fillable = [
        'id',
        'carrera_id',
        'descripcion',
        'oportunidades'

    ];

    protected $casts = [
        'oportunidades' => 'array',
    ];
    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }
}
