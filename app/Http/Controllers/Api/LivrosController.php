<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Autor;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivrosController extends Controller
{

    public function index()
    {

    }

    public function store(Request $request, Autor $autor)
    {
        return $autor->find($request['id'])->livros()->create($request->all());
    }

    public function show($id)
    {
        $livros = Livro::with('autor')->find($id);
        return $livros;
    }

    public function update(Request $request, Livro $livro)
    {
        $livro->fill($request->all())
            ->save();

        return $livro;
    }

    public function destroy($id)
    {
        Livro::destroy($id);
    }
}
