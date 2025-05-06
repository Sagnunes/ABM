<?php

namespace App\Http\Requests;

use App\Classes\info;
use Illuminate\Foundation\Http\FormRequest;

class MarcaAguaFormValidation extends FormRequest
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
            'tema'=>'required',
            'subTema'=>'required',
            'cota'=>'required',
            'resumo'=>'required',
            'fundo'=>'required',
            'data'=>'required',
            'folio'=>'required',
            'descricao'=>'required',
            'file'=>'required|image'
        ];
    }

    public function messages()
    {
        $mensagem = new info();
        return [
            'tema.required'=>$mensagem->validationText(),
            'subTema.required'=>$mensagem->validationText(),
            'cota.required'=>$mensagem->validationText(),
            'resumo.required'=>$mensagem->validationText(),
            'fundo.required'=>$mensagem->validationText(),
            'data.required'=>$mensagem->validationText(),
            'folio.required'=>$mensagem->validationText(),
            'descricao.required'=>$mensagem->validationText(),
            'file.required'=>$mensagem->validationText(),
            'file.image'=>'Tem de ser uma imagem'
        ];
    }
}
