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
            'autor_id' => ['required', 'integer'],
            'genero_id' => ['required', 'integer'],
            'titulo' => ['required', 'min:3'],
            'editora' => ['required', 'min:3'],
            'tipo_capa' => ['required', 'min:3'],
            'idioma' => ['required', 'min:3'],
            'ano_publicacao' => ['required', 'min:10', 'max:10'],
            'paginas' => ['required', 'integer']
        ];
    }
}
