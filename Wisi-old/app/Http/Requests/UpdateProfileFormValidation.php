<?php

namespace App\Http\Requests;

use App\Classes\info;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileFormValidation extends FormRequest
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
            'nome'=>'required|min:3',
            'telefone'=>'nullable|numeric',
            'imagem'=>'image',

        ];
    }

    public function messages()
    {
        $mensagem = new info();
        return [
            'nome.required'=>$mensagem->validationText(),
            'nome.min'=>'Tem de conter mais que três caracteres',
            'telefone.numeric'=>'O campo so permite números',
            'imagem.image'=>'O campo :attribute só aceita imagens',
        ];
    }
}
