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
        'paginas'
    ];

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }
}
