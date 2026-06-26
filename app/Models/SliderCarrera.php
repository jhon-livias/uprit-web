<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderCarrera extends Model
{
    //
    protected $table = 'sliders_carreras';

    protected $fillable = [
        'id',
        'carrera_id',
        'imagen',
        'orden'
        
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

}
