<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    protected $table = 'sliders';

    protected $fillable = [
        'id',
        'titulo_superior',
        'titulo_principal',
        'descripcion',
        'enlace_boton',
        'video',
        'imagen',
        'orden'
        
    ];
}
