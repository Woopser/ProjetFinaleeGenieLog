<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouleursRequest extends FormRequest
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
            'nom' => 'max:100|required',
            'codeRGB' => 'max:6|min:6|required|regex:/^([0-9]?a?b?c?d?e?f?A?B?C?D?E?F?)+$/|unique:couleurs'
        ];
    }

    public function messages()
    {
        return[
            'nom.max' => 'Le nom à un maximun de 100 caractère',
            'nom.required' => 'Le nom de la couleur est requise',
            'codeRGB.min' => 'Le code hexadecimal doit faire 6 caractères de long',
            'codeRGB.max' => 'Le code hexadecimal doit faire 6 caractères de long',
            'codeRGB.required' => 'Le code hexadecimal est requis',
            'codeRGB.regex' => 'Veillez utiliser un code hexadecimal valide pour le rgb',
            'codeRGB.unique' => 'Cette couleur est déjà utilisé'
        ];
        
    }
}

