<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NivelAcademico extends Model
{
    //
    protected $table = 'niveles_academicos';

    protected $fillable = [
        'id',
        'nombre'
        
    ];

    public function categorias()
    {
        return $this->hasMany(Categoria::class, 'nivel_academico_id');
    }
}
