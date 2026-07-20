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

    public function setPadreIdAttribute(mixed $value): void
    {
        if ($value === null || $value === '' || $value === 'null' || $value === 'undefined') {
            $this->attributes['padre_id'] = null;

            return;
        }

        $this->attributes['padre_id'] = (int) $value;
    }

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
