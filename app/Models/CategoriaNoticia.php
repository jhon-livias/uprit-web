<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaNoticia extends Model
{
    //
    protected $table = 'categorias_noticias';

    protected $fillable = [
        'id',
        'nombre'
        
    ];

    public function noticias()
    {
        return $this->hasMany(Noticia::class, 'categoria_noticia_id');
    }
}
