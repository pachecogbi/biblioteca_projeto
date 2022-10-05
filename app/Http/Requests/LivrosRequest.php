<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivrosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'autor_id' => 'required',
            'titulo' => 'unique:table,column,except,id',
            'editora' => 'required',
            'genero' => 'required',
            'idioma' => 'required',
            'ano_publicacao' => 'required|date',
            'preco' => 'required|integer'
        ];
    }
}
