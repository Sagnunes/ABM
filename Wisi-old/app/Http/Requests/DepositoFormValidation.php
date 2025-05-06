<?php

namespace App\Http\Requests;

use App\Classes\info;
use Illuminate\Foundation\Http\FormRequest;

class DepositoFormValidation extends FormRequest
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
            'fundo'=>'required',
            'cotaInicial'=>'required',
            'totalUI'=>'required|numeric',
            'D'=>'required|max:5',
            'B'=>'required|max:5',
            'E'=>'required|max:5',
            'P'=>'required|max:5',
            'dataDevolucao'=>'required',
            'observacao'=>'nullable',
        ];
    }

    public function messages()
    {
        $mensagem = new info();
        return [
            'cotaInicial.required'=>$mensagem->validationText(),
            'totalUI.required'=>$mensagem->validationText(),
            'D.required'=>$mensagem->validationText(),
            'B.required'=>$mensagem->validationText(),
            'E.required'=>$mensagem->validationText(),
            'P.required'=>$mensagem->validationText(),
            'dataDevolucao.required'=>$mensagem->validationText(),
        ];
    }
}
