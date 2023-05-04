<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComptesClientRequest extends FormRequest
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
            'prenom' => 'required|min:3|max:20|regex:/^[a-zA-ZÀ-ÿ]+$/',
            'nom' => 'required|min:3|max:20|regex:/^[a-zA-ZÀ-ÿ]+$/',
            'email' => 'required|max:100',
            'password' => 'required|min:8|max:20|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,20}$/'
        ];
    }

    public function messages(){
        return[
            'prenom.required' => 'Votre prenom est requis.',  
            'prenom.min' => 'Votre prenom doit avoir un minimum de 3 caractères',  
            'prenom.max' => 'Votre prenom doit avoir un maximum de 20 caractères ',
            'prenom.regex' => "Votre prenom doit contenir entre 3 et 20 caractères et pas d'accents",

            'nom.required' => 'Votre nom est requis.',  
            'nom.min' => 'Votre nom doit avoir un minimum de 3 caractères',  
            'nom.max' => 'Votre nom doit avoir un maximum de 20 caractères ',
            'nom.regex' => "Votre nom doit contenir entre 3 et 20 caractères et pas d'accents",
    
            'email.required' => 'Votre adresse courriel est requis.',  
            'email.max' => 'Votre adresse courriel doit avoir un maximum de 100 caractères', 

            'password.required' => 'Votre mot de passe est requis.',  
            'password.min' => 'Votre mot de passe doit avoir un minimum de 8 caractères',  
            'password.max' => 'Votre mot de passe doit avoir un maximum de 20 caractères ',
            'password.regex' => 'Votre mot de passe doit contenir au moins 8 caractères, incluant au moins une lettre, un chiffre et un symbole.',

        ];
        
    }
}