<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonio extends Model
{
    use SoftDeletes;

    //
    protected $table = 'testimonios';

    protected $fillable = [
        'id',
        'nombre',
        'profesion',
        'comentario',
        'calificacion',
        'imagen'
        
    ];
}
