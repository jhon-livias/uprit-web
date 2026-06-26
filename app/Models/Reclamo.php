<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
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
