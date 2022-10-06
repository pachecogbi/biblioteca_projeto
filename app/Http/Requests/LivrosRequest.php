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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => ['required', 'integer'],
            'titulo' => ['required', 'min:3'],
            'editora' => ['required', 'min:3'],
            'genero' => ['required', 'min:3'],
            'tipo_capa' => ['required', 'min:3'],
            'idioma' => ['required', 'min:3'],
            'ano_publicacao' => ['required', 'min:3'],
            'preco' => ['required', 'integer']
        ];
    }
}
