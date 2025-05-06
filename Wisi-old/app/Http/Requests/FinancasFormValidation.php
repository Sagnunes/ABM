<?php

namespace App\Http\Requests;

use App\Classes\info;
use Illuminate\Foundation\Http\FormRequest;

class FinancasFormValidation extends FormRequest
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
            'capilha'=>'required',
            'processo'=>'required',
            'entidade'=>'required',
            'tipo'=>'required',
            'nome'=>'required',
            'morada'=>'required',
            'freguesia'=>'required',
            'inicial'=>'required',
            'final'=>'required',
        ];
    }

    public function messages()
    {
        $mensagem = new info();
        return [
            'caixa.required'=>$mensagem->validationText(),
            'capilha.required'=>$mensagem->validationText(),
            'processo.required'=>$mensagem->validationText(),
            'entidade.required'=>$mensagem->validationText(),
            'tipo.required'=>$mensagem->validationText(),
            'nome.required'=>$mensagem->validationText(),
            'morada.required'=>$mensagem->validationText(),
            'freguesia.required'=>$mensagem->validationText(),
            'inicial.required'=>$mensagem->validationText(),
            'final.required'=>$mensagem->validationText(),
        ];
    }
}
