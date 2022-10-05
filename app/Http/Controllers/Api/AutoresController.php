<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AutorRequest;
use App\Models\Autor;
use Illuminate\Http\Request;

class AutoresController extends Controller
{

    public function index(AutorRequest $request)
    {
        $query = Autor::query();
        return $query->paginate(5);
    }

    public function store(AutorRequest $request)
    {
        return Autor::create($request->all());
    }

    public function show($id)
    {
        $autor = Autor::with('livros')->find($id);
        return $autor;
    }

    public function update(Autor $autor, AutorRequest $request)
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
