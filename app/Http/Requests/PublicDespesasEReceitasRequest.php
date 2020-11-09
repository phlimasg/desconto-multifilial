<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicDespesasEReceitasRequest extends FormRequest
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
            'documentos.*' => 'required|file|mimes:jpeg,jpg,pdf|max:5000',
            'tipo' => 'required|string|max:250',
            'descricao' => 'required|string|max:250',
            'valor' => 'required|string|max:250',
            'observacao' => 'required|string|max:250',
        ];
    }
    public function messages()
    {
        return [
            'required' => '*Obrigatório',
            'required_if' => '*Obrigatório',
        ];
    }
}
