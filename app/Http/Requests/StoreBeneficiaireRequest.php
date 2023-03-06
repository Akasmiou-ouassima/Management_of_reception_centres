<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBeneficiaireRequest extends FormRequest
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
            'cin'=>'required',
            'age'=>'required|integer',
            'date_naissance'=>'required|date',
            'sexe'=>'required',
            'situation'=>'required',
            'etat'=>'required',
            'date_entrée'=>'required|date',         
            'service'=>'required',
            'remarques'=>'required|min:10',
             'photo'=>'required',
        ];
    }
        public function messages()
            {
                return [
                    'nom.required' => 'Ce champ est obligatoire',
                    'prenom.required' => 'Ce champ est obligatoire',
                    'cin.required' => 'Ce champ est obligatoire',
                    'age.required' => 'Ce champ est obligatoire',
                    'date_naissance.required' => 'Ce champ est obligatoire',
                    'sexe.required' => 'Ce champ est obligatoire',
                    'situation.required' => 'Ce champ est obligatoire',
                    'etat.required' => 'Ce champ est obligatoire',
                    'date_entrée.required' => 'Ce champ est obligatoire',
                    'date_sortie.required' => 'Ce champ est obligatoire',
                    'service.required' => 'Ce champ est obligatoire',
                    'remarques.required' => 'Ce champ est obligatoire',
                     'remarques.max' =>'Ne dépasse pas 255 caractére',
                    'photo.required' => 'Ce champ est obligatoire',
                ];
            }
}
