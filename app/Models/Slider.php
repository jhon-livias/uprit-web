<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use SoftDeletes;

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
