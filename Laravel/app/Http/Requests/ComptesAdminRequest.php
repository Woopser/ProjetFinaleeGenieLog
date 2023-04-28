<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComptesAdminRequest extends FormRequest
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
            'prenom' => 'required|min:3|max:100|regex:/[a-zA-ZÀ-ÿ]+/',
            'nom' => 'required|min:3|max:100|regex:/[a-zA-ZÀ-ÿ]+/',
            'email' => 'required|max:100|regex:/^[a-zA-ZÀ-ÿ]+(\.[a-zA-Z]+)+\.([0-9]{2})@cegeptr.qc.ca$/|unique:comptes'
        ];
    }

    public function messages(){
        return[
            'prenom.required' => 'Le nom est requis.',
            'prenom.min' => 'Le prenom doit avoir au moin 3 caractères.',
            'prenom.max' => 'Le prenom doit avoir moin que 100 caractères.',
            'prenom.regex' => 'Le prenom ne peut avoir que des lettres et des accents.',

            'nom.required' => 'Le nom est requis',
            'nom.min' => 'Le nom doit avoir au moin 3 caractères.',
            'nom.max' => 'Le nom doit avoir moin que 100 caractères',
            'nom.regex' => 'Le nom doit ne peut avoir que des lettres et des accents.',

            'email.required' => 'Le email est requis',
            'email.max' => 'Le email doit avoir moin que 100 caractères.',
            'email.regex' => 'Le email doit être conforme au email du cegep de Trois-Rivières.',
            'email.unique' => 'Le email est déjà utilisé'
        ];
    }
}
