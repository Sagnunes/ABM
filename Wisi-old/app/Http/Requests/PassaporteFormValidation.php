<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassaporteFormValidation extends FormRequest
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
            'caixa'=>'required',
            'processo'=>'required',
            'folha'=>'required',
            'ano'=>'required',
            'mes'=>'required',
            'passaporte'=>'required',
            'requerente'=>'required',
            'naturalidade'=>'required',
            'destino'=>'required',
        ];
    }
    public function messages()
    {
        $mensagem = "É obrigatório o preenchimento deste campo";
        return [
            'caixa.required'=>$mensagem,
            'folha.required'=>$mensagem,
            'processo.required'=>$mensagem,
            'ano.required'=>$mensagem,
            'mes.required'=>$mensagem,
            'passaporte.required'=>$mensagem,
            'requerente.required'=>$mensagem,
            'naturalidade.required'=>$mensagem,
            'destino.required'=>$mensagem,
        ];
    }
}
