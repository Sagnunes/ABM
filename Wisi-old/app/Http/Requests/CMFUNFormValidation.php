<?php

namespace App\Http\Requests;

use App\Classes\info;
use Illuminate\Foundation\Http\FormRequest;

class CMFUNFormValidation extends FormRequest
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
            'cota'=>'required',
            'codRef'=>'required',
            'dimSuporte'=>'required',
            'areaOrg'=>'required',
            'nivelDescricao'=>'required',
            'serie'=>'required',
            'tituloOriginal'=>'required',
            'titulo'=>'required',
            'dataInicial'=>'required',
            'dataFinal'=>'required',
            'ambito'=>'required',
            'observacao'=>'nullable',
            'estado'=>'required',
        ];
    }

    public function messages()
    {
        $mensagem = new info();
        return [
            'fundo.required'=>$mensagem->validationText(),
            'cota.required' => $mensagem->validationText(),
            'codRef.required'=>$mensagem->validationText(),
            'dimSuporte.required'=>$mensagem->validationText(),
            'areaOrg.required'=>$mensagem->validationText(),
            'nivelDescricao.required'=>$mensagem->validationText(),
            'serie.required'=>$mensagem->validationText(),
            'tituloOriginal.required'=>$mensagem->validationText(),
            'titulo.required'=>$mensagem->validationText(),
            'dataInicial.required'=>$mensagem->validationText(),
            'dataFinal.required'=>$mensagem->validationText(),
            'ambito.required'=>$mensagem->validationText(),
            'estado.required'=>$mensagem->validationText(),
        ];
    }
}
