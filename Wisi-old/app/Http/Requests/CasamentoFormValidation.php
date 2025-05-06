<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CasamentoFormValidation extends FormRequest
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
            'data' => 'required',
            'local'=>'required',
            'livro'=>'required',
            'folha'=>'required',
            'marido'=>'required',
            'mulher'=>'required',
            'observacao'=>'nullable'
        ];
    }
    public function messages()
    {
        $mensagem = "É obrigatório o preenchimento deste campo";
        return [
            'data.required'=>$mensagem,
            'local.required' => $mensagem,
            'livro.required'=>$mensagem,
            'folha.required'=>$mensagem,
            'marido.required'=>$mensagem,
            'mulher.required'=>$mensagem,
        ];
    }
}
