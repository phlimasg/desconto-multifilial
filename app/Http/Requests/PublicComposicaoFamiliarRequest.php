<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicComposicaoFamiliarRequest extends FormRequest
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
            'nome' =>  'required|string|max:250',
            'parentesco' =>  'required|string|max:250',
            'idade' =>  'required|numeric|max:110',
            'estado_civil' =>  'required|string|max:250',
            'escolaridade' =>  'required|string|max:250',
            'profissao' =>  'required|string|max:250',
            'salario' =>  'required|string|max:250',
            'documentos.*' =>  'required|file|mimes:jpeg,jpg,pdf|max:5000',
        ];
    }
    public function messages()
    {
        return [
            'required' => '* :attribute Obrigatório',
            'required_if' => '* :attribute Obrigatório',
            'string' => '* :attribute Insira um texto',
            'max' => '* :attribute Maximo de 5mb por arquivo',
            'required' => 'Campo obrigatório',
            'mimes' => 'Permitido somente jpeg, jpg e pdf',
            'file' => 'Falha no upload. Máximo de 5mb.',
            'uploaded' => 'Falha no upload. Máximo de 5mb.',
        ];
    }
}
