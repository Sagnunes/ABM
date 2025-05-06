<?php

namespace App\Http\Requests;

use App\Classes\info;
use Illuminate\Foundation\Http\FormRequest;

class NoticiasFormValidation extends FormRequest
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
            'titulo'=>'required',
            'descricao'=>'required'
        ];
    }

    public function messages()
    {
        $mensagem = new info();
        return[
            'titulo.required'=>$mensagem->validationText(),
            'descricao.required'=>$mensagem->validationText()
        ];
    }
}
