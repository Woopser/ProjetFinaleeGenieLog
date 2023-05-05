<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'prix' => 'max:100',
            'nom' => 'required|max:100',
            'image' => 'image|mimes:png,jpeg,jpg,gif|max:4096',
            'nb_max' => 'required|min:1|max:2|regex:/^[0-9]+$/'
            
        ];
    }

    public function messages()
    {
        return [
            //'prix.regex' => 'Le prix ne peut être que des chiffres.',
            'prix.max' => 'Vous ne pouvez pas rentrer plus de 100 caractères.',
            'nom.required' => 'Le nom est requis.',
            'nom.max' => 'Vous ne pouvez pas rentrez plus de 100 caractères.',
            'image.image' => 'Vous devez donner une image.',
            'image.mimes' => 'Vous ne respectez pas les formats accepté sois : png,jpeg,jpg,gif.',
            'image.max' => 'l\'image ne doit pas faire plus que 4096 Mo.',
            'nb_max.required' => 'Le champ nombre maximum est obligatoire.',
            'nb_max.min' => 'Le champ nombre maximum doit être au moins que 1 caractères.',
            'nb_max.max' => 'Le champ nombre maximum ne doit pas dépasser 2 caractères.',
            'nb_max.regex' => 'Ne rentrez que des chiffres pour la quantity maximal.'
        ];
    }
}
