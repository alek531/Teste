<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DadosRequest extends FormRequest
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
            
            'nome'       => 'required|min:3',         
            'phone'       => 'required',             
            'email'       => 'required|min:5',             
            'logo'       => 'required|image',
        ];
    }

     public function messages(){
        return [
            'required' => 'Este campo é obrigatorio',
            'image' => 'arquivo não é uma imagem valida!',
        ];
    }
}
