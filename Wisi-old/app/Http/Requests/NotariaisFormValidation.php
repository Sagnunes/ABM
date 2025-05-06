<?php

namespace App\Http\Requests;

use App\Classes\info;
use Illuminate\Foundation\Http\FormRequest;

class NotariaisFormValidation extends FormRequest
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
            'cartorio' => 'required',
            'notario'=>'required',
            'cota'=>'required',
            'tipologia' => 'required',
            'data'=>'required',
            'livro'=>'required',
            'folha' => 'required',
        ];
    }

    public function messages()
    {
        $mensagem = new info();

        return [
            'nome.required'=>$mensagem->validationText(),
            'cartorio.required'=>$mensagem->validationText(),
            'notario.required'=>$mensagem->validationText(),
            'cota.required'=>$mensagem->validationText(),
            'tipologia.required'=>$mensagem->validationText(),
            'data.required'=>$mensagem->validationText(),
            'livro.required'=>$mensagem->validationText(),
            'folha.required'=>$mensagem->validationText(),
        ];
    }
}
