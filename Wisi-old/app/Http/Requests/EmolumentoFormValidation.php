<?php

namespace App\Http\Requests;

use App\Classes\info;
use Illuminate\Foundation\Http\FormRequest;

class EmolumentoFormValidation extends FormRequest
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
            'data'=> 'required',
            'requerente'=> 'required',
            'teorDoc'=> 'required',
            'livro'=> 'required',
            'cota'=> 'required',
            'registo'=> 'required',
            'processo'=> 'required',
            'folha'=> 'required',
            'pagamento'=> 'required',
            'ano'=> 'required',
            'valor'=> 'required'
        ];
    }
    public function messages(){
        $mensagem = new info();
        return[
            'data.required'=> $mensagem->validationText(),
            'requerente.required'=> $mensagem->validationText(),
            'teorDoc.required'=> $mensagem->validationText(),
            'livro.required'=> $mensagem->validationText(),
            'cota.required'=> $mensagem->validationText(),
            'registo.required'=> $mensagem->validationText(),
            'processo.required'=> $mensagem->validationText(),
            'folha.required'=> $mensagem->validationText(),
            'ano.required'=> $mensagem->validationText(),
            'valor.required'=> $mensagem->validationText(),
            'pagamento.required'=> $mensagem->validationText()
        ];
    }
}
