<?php

namespace App\Http\Requests;

use App\Classes\info;
use Illuminate\Foundation\Http\FormRequest;

class ProdutoFormValidation extends FormRequest
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
            'nome'=>'required',
            'familia'=>'required',
            'stock'=>'required',
            'stock_minimo'=>'required'
        ];
    }

    public function messages()
    {
        $mensagem = new info();
        return [
            'nome.required'=>$mensagem->validationText(),
            'familia.required'=>$mensagem->validationText(),
            'stock.required'=>$mensagem->validationText(),
            'stock_minimo.required'=>$mensagem->validationText()
        ];
    }
}
