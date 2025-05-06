<?php

namespace App\Http\Requests;

use App\Classes\info;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountFormValidation extends FormRequest
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
           'password'=>'required|min:5'
        ];
    }
    public function messages()
    { $mensagem = new info();
        return [
            'password.required'=>$mensagem->validationText(),
            'password.min'=>'Tem de conter mais que cinco caracteres'

        ];
    }
}
