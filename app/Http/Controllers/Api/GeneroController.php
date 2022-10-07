<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenerosRequest;
use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{

    public function index()
    {
        $query = Genero::all(); // Alterar isso depois
        return $query;
    }

    public function store(GenerosRequest $request)
    {
        return Genero::create($request->all());
    }

    public function show($id)
    {
        $genero = Genero::with('livros.autores')->find($id);

        if ($genero === null) {
            return response()
                ->json(['message' => 'Gênero inexistente.']);
        }

        return $genero;
    }

    public function update(Request $request, $id)
    {
        Genero::where('id', $id)->update($request->all());

        return response()
            ->json(['message'=> 'Genero Atualizado com sucesso']);
    }

    public function destroy($id)
    {
        Genero::destroy($id);
    }
}
