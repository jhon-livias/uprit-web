<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarreraPregunta extends Model
{
    //
    protected $table = 'carrera_preguntas';

    protected $fillable = [
        'id',
        'carrera_id',
        'pregunta',
        'respuesta'
        
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }
}
