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
            'prenom' => 'required|min:3|max:100',
            'nom' => 'required|min:3|max:100',
            'email' => 'required|max:100|regex:/^[a-zA-Z]+(\.[a-zA-Z]+)+\.([0-9]{2})@cegeptr.qc.ca$/'
        ];
    }

    public function messages(){
        return[
            'prenom.required' => 'Le nom est requis.',
            'prenom.min' => 'Le prenom doit avoir au moin 3 caractères.',
            'prenom.max' => 'Le prenom doit avoir moin que 100 caractères.',
            'nom.required' => 'Le nom est requis',
            'nom.min' => 'Le nom doit avoir au moin 3 caractères.',
            'nom.max' => 'Le nom doit avoir moin que 100 caractères',
            'email.required' => 'Le email est requis',
            'email.max' => 'Le email doit avoir moin que 100 caractères.',
            'email.regex' => 'Le email doit être conforme au email du cegep de Trois-Rivières.'
        ];
    }
}
