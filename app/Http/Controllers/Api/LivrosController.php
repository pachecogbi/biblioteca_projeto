<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genero;
use App\Http\Requests\LivrosRequest;
use App\Mail\LivroMail;
use App\Models\Autor;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function store(Request $request)
    {
        return Livro::create($request->all());
    }

    public function show($id)
    {
        $livros = Livro::with('autor')->find($id);

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
