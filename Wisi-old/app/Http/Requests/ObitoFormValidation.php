<?php

namespace App\Http\Requests;

use App\Classes\info;
use Illuminate\Foundation\Http\FormRequest;

class ObitoFormValidation extends FormRequest
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
            'local'=>'required',
            'nome'=>'required',
            'data'=>'required',
            'livro'=>'required',
            'folha'=>'required',
            'numero'=>'required',
            'observacao'=>'nullable'
        ];
    }

    public function messages()
    {
        $mensagem = new info();
        return [
            'local.required'=>$mensagem->validationText(),
            'nome.required' => $mensagem->validationText(),
            'data.required'=>$mensagem->validationText(),
            'livro.required'=>$mensagem->validationText(),
            'folha.required'=>$mensagem->validationText(),
            'numero.required'=>$mensagem->validationText(),
        ];
    }
}
