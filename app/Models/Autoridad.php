<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autoridad extends Model
{
    use HasFactory;

    protected $table = 'autoridades';

    protected $fillable = [
        'nombre',
        'cargo',
        'tipo',
        'foto',
        'cv_path',
        'orden',
        'estado'
    ];
}
