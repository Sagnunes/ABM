<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class assiduidadeFormValidation extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nrCartao'=> 'required|max:50'
            'dataInicial'=> 'required|date',
            'dataFinal'=> 'required|date',
            
        ];
    }

     public function messages(){

        return[
            'nrCartao.required'=> 'É obrigatório preencher este campo'
            'dataInicial.required'=> 'É obrigatório preencher este campo',
            'dataFinal.required'=> 'É obrigatório preencher este campo',
            
        ];
    }
}
