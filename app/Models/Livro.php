<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'editora',
        'genero',
        'tipo_capa',
        'idioma',
        'ano_publicacao',
        'preco'
    ];

    public function getPrecoAttribute()
    {
        return $this->attributes['preco'] / 100;
    }

    public function setPrecoAttribute($attr)
    {
        return $this->attributes['preco'] = $attr * 100;
    }

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }
}
