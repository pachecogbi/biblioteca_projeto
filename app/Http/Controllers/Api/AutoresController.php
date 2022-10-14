<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AutoresRequest;
use App\Models\Autor;
use App\Models\Livro;
use Illuminate\Http\Request;

class AutoresController extends Controller
{

    public function index(Request $request)
    {
        $query = Autor::query();

        if($request->has('nome')){
            $query->where('nome', $request->nome);
        }

        return $query->paginate(5);
    }

    public function store(AutoresRequest $request)
    {
        return Autor::create($request->all());
    }

    public function show($id, Livro $livro)
    {
        $autor = Autor::with('livros.genero')->find($id);

        if (!$autor) {
            return response()
                ->json(['message' => 'Autor inexistente.']);
        }

        return $autor;
    }

    public function update(int $id, AutoresRequest $request)
    {
        Autor::where('id', $id)->update($request->all());

        return response()
            ->json(['message'=> 'Autor Atualizado com sucesso']);
    }

    public function destroy(int $id)
    {
        Autor::destroy($id);
    }
}
