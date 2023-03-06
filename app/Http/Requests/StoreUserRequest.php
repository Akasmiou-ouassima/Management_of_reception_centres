<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'nom'=>'required|string',
            'prenom'=>'required|string',
            'date'=>'required|date',
            'âge'=>'required|integer',
            'num'=>'required|string',
            'sexe'=>'required|string',
            'poste'=>'required|string',
            'email'=>'required|string|email',
            'password'=>'required|string',
            'photo'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'nom.required'=>'Ce champ est obligatoire',
            'prenom.required'=>'Ce champ est obligatoire',
            'date.required'=>'Ce champ est obligatoire',
            'âge.required'=>'Ce champ est obligatoire',
            'num.required'=>'Ce champ est obligatoire',
            'sexe.required'=>'Ce champ est obligatoire',
            'poste.required'=>'Ce champ est obligatoire',
            'email.required'=>'Ce champ est obligatoire',
            'password.required'=>'Ce champ est obligatoire',
            'photo.required'=>'Ce champ est obligatoire',

        ];
    }
}
