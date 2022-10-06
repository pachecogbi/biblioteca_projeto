<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Autor;
use Illuminate\Http\Request;

class LivrosController extends Controller
{

    public function index()
    {
        //
    }

    public function store(Request $request, Autor $autor)
    {
        return $autor->find($request['id'])->livros()->create($request->all());
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
