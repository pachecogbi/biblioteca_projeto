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
        return $query->paginate(5);
    }

    public function store(Request $request)
    {
        return Autor::create($request->all());
    }

    public function show($id)
    {
        $autor = Autor::with('livros')->find($id);
        return $autor;
    }

    public function update(Autor $autor, Request $request)
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
