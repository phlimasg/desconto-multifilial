<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicRespFinRequest extends FormRequest
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
        'resp_vinculo' => 'required|string|max:250',
        'nome' => 'required|string|max:250',
        'estado_civil' => 'required|string|max:250',
        'nacionalidade' => 'required|string|max:250',
        'naturalidade' => 'required|string|max:250',
        'escolaridade' => 'required|string|max:250',
        'profissao' => 'required|string|max:250',
        'dt_nasc' => 'required|date|max:250',
        'email' => 'required|email|max:250',
        'rua' => 'required|string|max:250',
        'numero' => 'required|string|max:250',
        'complemento' => 'required|string|max:250',
        'bairro' => 'required|string|max:250',
        'cidade' => 'required|string|max:250',
        'estado' => 'required|string|max:250',
        'cep' => 'required|string|max:250',
        'telefone' => 'required|string|max:250',
        'celular' => 'required|string|max:250',
        'cpf' => 'required|string|max:250',
        'rg' => 'required|string|max:250',
        'orgao_emissor' => 'required|string|max:250',
        'dt_emissor' => 'required|date|max:250',
        ];
    }
    public function messages()
    {
        return [
            'required' => '* Obrigatório',
            'required_if' => '* Obrigatório',
        ];
    }
}
