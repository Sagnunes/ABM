<?php

namespace App\Http\Requests;

use App\Classes\info;
use Illuminate\Foundation\Http\FormRequest;

class ProjetoObrasFormValidation extends FormRequest
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
            'entidade'=>'required',
            'objeto'=>'required',
            'concelho'=>'required',
            'freguesia'=>'required',
            'sitio'=>'nullable',
            'localizacao'=>'nullable',
            'tipo_obra'=>'required',
            'data'=>'required',
            'volume'=>'nullable',
            'cota'=>'required',
            'documento'=>'required',
            'projeto'=>'required',
            'observacao'=>'nullable'
        ];
    }

    public function messages()
    {
        $mensagem = new info();
        return [
            'entidade.required'=>$mensagem->validationText(),
            'objeto.required'=>$mensagem->validationText(),
            'concelho.required'=>$mensagem->validationText(),
            'freguesia.required'=>$mensagem->validationText(),
            'tipo_obra.required'=>$mensagem->validationText(),
            'data.required'=>$mensagem->validationText(),
            'cota.required'=>$mensagem->validationText(),
            'documento.required'=>$mensagem->validationText(),
            'projeto.required'=>$mensagem->validationText(),
        ];
    }
}
