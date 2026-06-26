<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $table = 'categorias';

    protected $fillable = [
        'id',
        'nivel_academico_id',
        'padre_id',
        'nombre'
        
    ];

    public function nivelAcademico()
    {
        return $this->belongsTo(NivelAcademico::class);
    }

    public function padre()
    {
        return $this->belongsTo(Categoria::class, 'padre_id');
    }

    public function hijos()
    {
        return $this->hasMany(Categoria::class, 'padre_id');
    }

    public function carreras()
    {
        return $this->hasMany(Carrera::class, 'categoria_id');
    }
}
