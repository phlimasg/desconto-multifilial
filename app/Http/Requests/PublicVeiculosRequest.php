<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicVeiculosRequest extends FormRequest
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
            'veiculo_fabricante' => 'required|string|max:250',
            'veiculo_ano' => 'required|numeric|max:'.date('Y'),
            'veiculo_modelo' => 'required|string|max:250',
            'veiculo_placa' => 'required|string|max:250',
        ];
    }
}
