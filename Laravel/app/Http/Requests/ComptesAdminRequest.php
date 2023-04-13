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
            'email' => 'required|max:100|regex:/^[a-zA-Z]+(\.[a-zA-Z]+)+\.([0-9]+)@cegeptr.qc.ca$/'
        ];
    }
}
