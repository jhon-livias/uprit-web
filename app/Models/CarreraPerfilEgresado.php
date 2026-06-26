<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarreraPerfilEgresado extends Model
{
    //
    protected $table = 'carrera_perfil_egresado';

    protected $fillable = [
        'id',
        'carrera_id',
        'descripcion',
        
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }


}
