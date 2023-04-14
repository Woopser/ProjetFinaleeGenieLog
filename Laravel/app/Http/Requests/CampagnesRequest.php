<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampagnesRequest extends FormRequest
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
            'nom' => 'required|min:5|max:50',
            'dateDebut' => 'required|date|after_or_equal:today',
            'dateDebFond' => 'required|date|after:today|after_or_equal:dateDebut',
            'dateRemiseFond' => 'required|date|after:today|after:dateDebut|after:dateDebFond',
            'dateFin' => 'required|date|after:today|after:dateDebut|after:dateDebFond|after_or_equal:dateRemiseFond'
        ];
    }

    public function messages(){
        return[
        'nom.required' => 'Le nom est requis.',
        'nom.min' => 'Le nom doit être composé d\'au moins 5 caractères.',
        'nom.max' => 'Le nom ne doit pas dépasser 50 caractères.',
        'dateDebut.required' => 'La date de début est requise.',
        'dateDebut.date' => 'La date de début doit être une date valide.',
        'dateDebut.after_or_equal' => 'La date de début ne peut pas être antérieure à aujourd\'hui.',
        'dateDebFond.required' => 'La date de début de remise de fond est requise.',
        'dateDebFond.date' => 'La date de début de remise de fond doit être une date valide.',
        'dateDebFond.after' => 'La date de début de collecte de fond ne peut pas être antérieure à aujourd\'hui.',
        'dateDebFond.after_or_equal' => 'La date de début de collecte de fond ne peut pas être antérieure à la date de début.',//la
        'dateRemiseFond.required' => 'La date de remise de fond est requise.',
        'dateRemiseFond.date' => 'La date de remise de fond doit être une date valide.',
        'dateRemiseFond.after:today' => 'La date de remise de fond ne doit pas être antérieure à aujourd\'hui.',
        'dateRemiseFond.after:dateDebut' => 'La date de remise de fond ne doit pas être antérieure à la date de début.',
        'dateRemiseFond.after:dateDebfond' => 'La date de remise de fond doit être antérieure à la date de début de remise de fond.',
        'dateFin.required' => 'La date de fin est requise.',
        'dateFin.date' => 'La date de fin doit être une date valide.',
        'dateFin.after:today' => 'La date de fin ne doit pas être antérieure à aujourd\'hui.',
        'dateFin.after:dateDebut' => 'La date de fin ne doit pas être antérieure à la date de début.',
        'dateFin.after:dateDebFond' => 'La date de fin ne doit pas être antérieure à la date de début de remise de fond.',
        'dateFin.after:dateRemiseFond' => 'La date de fin ne doit pas être antérieure à la date de remise de fond.'
        ];
    }
}
