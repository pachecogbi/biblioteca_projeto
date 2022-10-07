<?php

namespace App\Http\Controllers\Api;

use App\Events\LivroCriado;
use App\Http\Controllers\Controller;
use App\Http\Requests\LivrosRequest;
use App\Models\Livro;
use App\Models\Autor;
use Illuminate\Http\Request;

class LivrosController extends Controller
{

    public function index(Request $request)
    {
        $query = Livro::query();

        if ($request->has('titulo')) {
            $query->where('titulo', $request->nome);
        }

        return $query->paginate(5);
    }

    public function store(LivrosRequest $request)
    {
        $livro = Livro::create($request->all());
        $autor = Autor::find($request['autor_id']);

        LivroCriado::dispatch(
            $livro->titulo,
            $autor->nome
        );

        return $livro;
    }

    public function show($id)
    {
        $livros = Livro::with('autor', 'genero')->find($id);

        if ($livros === null) {
            return response()
                ->json(['message' => 'Livro inexistente.']);
        }

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
