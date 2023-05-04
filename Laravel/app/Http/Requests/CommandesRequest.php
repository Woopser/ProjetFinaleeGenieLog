<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommandesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'article_id' => 'required|numeric',
            'couleur_id' => 'required|numeric',
            'dimension_id' => 'required|numeric',
            'campagne_id' =>'required|numeric',
            'compte_id' => 'required|numeric',
            'compte_id_modification' => 'required|numeric',
            'dateCommande' => 'required|date|after:today',
            'statu' => 'required'
        ];
    }

    public function message()
    {
        return [
            'article_id.required' => 'Le champ Article est obligatoire.',
            'article_id.numeric' => 'Le champ Article doit être numérique.',

            'couleur_id.required' => 'Le champ Couleur est obligatoire.',
            'couleur_id.numeric' => 'Le champ Couleur doit être numérique.',

            'dimension_id.required' => 'Le champ Dimension est obligatoire.',
            'dimension_id.numeric' => 'Le champ Dimension doit être numérique.',

            'compte_id.required' => 'Le champ Compte est obligatoire.',
            'compte_id.numeric' => 'Le champ Compte doit être numérique.',

            'campagne_id.required' => 'Le champ campagne est obligatoire.',
            'campagne_id.numeric' => 'Le champ campagne doit être numérique.',

            'compte_id_modification.required' => 'Le champ Compte Modification est obligatoire.',
            'compte_id_modification.numeric' => 'Le champ Compte Modification doit être numérique.',

            'dateCommande.required' => 'Le champ Date Commande est obligatoire.',
            'dateCommande.date' => 'Le champ Date Commande doit être une date valide.',
            'dateCommande.after' => 'Le champ Date Commande doit être une date ultérieure à aujourd\'hui.',

            'statu.required' => 'Le champ Statut est obligatoire.'

        ];
    }
}
