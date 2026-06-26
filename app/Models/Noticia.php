<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    //
    protected $table = 'noticias';

    protected $fillable = [
        'id',
        'categoria_noticia_id',
        'titulo',
        'fecha',
        'descripcion_corta',
        'imagen',
        'tags',
        'autor_nombre',
        'autor_descripcion',
        'autor_imagen',
        'descripcion_total'
        
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public function categoriaNoticia()
    {
        return $this->belongsTo(CategoriaNoticia::class);
    }
}
