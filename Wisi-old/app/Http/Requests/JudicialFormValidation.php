<?php

namespace App\Http\Requests;

use App\Classes\info;
use Illuminate\Foundation\Http\FormRequest;

class JudicialFormValidation extends FormRequest
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
            'dataInicial'=>'required',
            'dataFinal'=>'required',
            'numero'=>'required',
            'numeroProcesso'=>'nullable',
            'observacao'=>'nullable',
            'freguesia'=>'required',
            'tribunal'=>'required',
            'juizo'=>'nullable',
            'classificacao'=>'nullable',
            'oficio'=>'nullable',
            'tipologia'=>'required',
        ];
    }
    public function messages()
    {
        $mesagem = new info();
        return [
            'autor.required'=>$mesagem->validationText(),
            'ano.required'=>$mesagem->validationText(),
            'dataInicial.required'=>$mesagem->validationText(),
            'dataFinal.required'=>$mesagem->validationText(),
            'numero.required'=>$mesagem->validationText(),
            'numeroProcesso.required'=>$mesagem->validationText(),
            'tribunal.required'=>$mesagem->validationText(),
            'tipologia.required'=>$mesagem->validationText(),
            'freguesia.required'=>$mesagem->validationText(),
        ];
    }
}
