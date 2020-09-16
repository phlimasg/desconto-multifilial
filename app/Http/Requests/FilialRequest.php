<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilialRequest extends FormRequest
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
            'codigo' => 'required|numeric|unique:App\Models\Admin\Filial,codigo|max:250',
            'nome' => 'required|string|unique:App\Models\Admin\Filial,nome|max:250',
            'descricao' => 'nullable|string|required|max:240',
        ];
    }
}
