<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCentreRequest extends FormRequest
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
            'adresse'=>'required|string',
            'email'=>'required|string|email',
            'numéro_telephone'=>'required',
            'disponibilité'=>'required|integer',
            'capacité'=>'required|integer',
            'description'=>'required|min:10',
        ];
    }
    public function messages()
    {
        return [
            'nom.required'=>'Ce champ est obligatoire',
            'adresse.required'=>'Ce champ est obligatoire',
            'email.required'=>'Ce champ est obligatoire',
            'numéro_telephone.required'=>'Ce champ est obligatoire',
            'disponibilité.required'=>'Ce champ est obligatoire',
            'capacité.required'=>'Ce champ est obligatoire',
            'description.required'=>'Ce champ est obligatoire',
            'description.max' =>'Ne dépasse pas 255 caractére',
        ];
    }
}
