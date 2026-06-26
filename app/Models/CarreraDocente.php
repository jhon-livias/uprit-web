<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarreraDocente extends Model
{
    //
    protected $table = 'carrera_docentes';

    protected $fillable = [
        'id',
        'carrera_id',
        'nombre',
        'tags',
        'correo',
        'departamento',
        'descripcion',
        'linkedin',
        'imagen'
        
    ];

    protected $casts = [
    'tags' => 'array',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }
}
