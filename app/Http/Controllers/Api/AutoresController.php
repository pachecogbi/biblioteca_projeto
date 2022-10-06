<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AutoresRequest;
use App\Models\Autor;
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

    public function show($id)
    {
        $autor = Autor::with('livros')->find($id);

        if ($autor === null) {
            return response()
                ->json(['message' => 'Autor inexistente.']);
        }

        return $autor;
    }

    public function update(Autor $autor, AutoresRequest $request)
    {
        $autor->fill($request->all())
            ->save();

        return $autor;
    }

    public function destroy(int $id)
    {
        Autor::destroy($id);
    }
}
