<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    protected $fillable = [
        'autor_id',
        'genero_id',
        'titulo',
        'editora',
        'tipo_capa',
        'idioma',
        'ano_publicacao',
        'paginas'
    ];

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }
}
