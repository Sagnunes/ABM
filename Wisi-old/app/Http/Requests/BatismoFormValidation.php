<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BatismoFormValidation extends FormRequest
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
            'local' => 'required',
            'data'=>'required',
            'filho'=>'required',
            'mae' => 'required',
            'pai'=>'required',
            'observacao'=>'nullable'
        ];
    }

    public function messages()
    {
        $mensagem = "É obrigatório o preenchimento deste campo";
        return [
            'local.required'=>$mensagem,
            'data.required' =>$mensagem,
            'filho.required'=>$mensagem,
            'mae.required'=>$mensagem,
            'pai.required'=>$mensagem,
            'dataDevolucao.required'=>$mensagem
        ];
    }
}
