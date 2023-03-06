<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'type'=>'required|string',
            'disponibilité'=>'required|integer',
            'description'=>'required|min:10',
        ];
    }
    public function messages()
    {
        return [
            'nom.required'=>'Ce champ est obligatoire',
            'type.required'=>'Ce champ est obligatoire',
            'disponibilité.required'=>'Ce champ est obligatoire',
            'description.required'=>'Ce champ est obligatoire',
            'description.max' =>'Ne dépasse pas 255 caractére',
        ];
    }
}
