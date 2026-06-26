<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    //
    protected $table = 'carreras';

    protected $fillable = [
        'id',
        'categoria_id',
        'nombre',
        'descripcion',
        'admision',
        'duracion',
        'grado_obtenido',
        'titulacion',
        'modalidades',
        'brochure',
        'imagen'

    ];


    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function preguntas()
    {
        return $this->hasMany(CarreraPregunta::class, 'carrera_id');
    }

    public function docentes()
    {
        return $this->hasMany(CarreraDocente::class, 'carrera_id');
    }

    public function malla()
    {
        return $this->hasMany(CarreraMalla::class, 'carrera_id');
    }

    public function detalle_descripcion()
    {
        return $this->hasOne(
            CarreraDescripcion::class,
            'carrera_id'
        );
    }

    public function perfilEgresado()
    {
        return $this->hasOne(
            CarreraPerfilEgresado::class,
            'carrera_id'
        );
    }
}
