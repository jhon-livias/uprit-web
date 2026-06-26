<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarreraMalla extends Model
{
    //
    protected $table = 'carrera_malla_curricular';

    protected $fillable = [
        'id',
        'carrera_id',
        'ciclo',
        'descripcion',
        'cursos'
        
    ];

    protected $casts = [
        'cursos' => 'array',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }


}
