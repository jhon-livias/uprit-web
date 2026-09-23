<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reclamo extends Model
{
    use SoftDeletes;

    //
    protected $table = 'reclamos';

    protected $fillable = [
        'id',
        'razon_social',
        'ruc',
        'domicilio_fiscal',
        'fecha',
        'sede',
        'unidad',
        'nombres',
        'apellidos',
        'domicilio',
        'dni',
        'telefono',
        'correo',
        'apoderado',
        'tipo',
        'descripcion',
        'monto',
        'tipo_reclamo',
        'detalle',
        'evidencia',
        
    ];
}
