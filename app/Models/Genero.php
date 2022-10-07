<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Genero extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome_genero',
    ];
    public $timestamps = false;
    protected $appends = ['links'];

    public function livros(){
        return $this->hasMany(Livro::class);
    }

    protected static function booted()
    {
        self::addGlobalScope('ordered', function (Builder $queryBuilder) {
            $queryBuilder->orderBy('nome_genero');
        });
    }

    public function links(): Attribute
    {
        return new Attribute(
            get: fn () => [
                [
                    'rel' => 'self',
                    'url' => "/api/generos/{$this->id}"
                ]
            ]
            );
    }
}
