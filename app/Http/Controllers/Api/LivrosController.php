<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LivrosRequest;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivrosController extends Controller
{

    public function index(LivrosRequest $request)
    {
        $query = Livro::query();

        if ($request->has('titulo')) {
            $query->where('titulo', $request->nome);
        }

        return $query->paginate(5);
    }

    public function store(LivrosRequest $request)
    {
        return Livro::create($request->all());
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

    public function update(LivrosRequest $request, Livro $livro)
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
