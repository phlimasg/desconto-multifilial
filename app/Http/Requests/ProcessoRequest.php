<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessoRequest extends FormRequest
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
            'nome' => 'required|string|max:250',
            'tipo' => 'required|string|max:250',
            'email' => 'required|string|max:250|regex:(@lasalle)',
            'periodo_ini' => 'required|date_format:Y-m-d|max:15',
            'periodo_fim' => 'required|date_format:Y-m-d|max:15',
            'hora_ini' => 'required|date_format:H:i|max:15',
            'hora_fim' => 'required|date_format:H:i|max:15',
        ];
    }
    public function messages()
    {
        return [
            'required' => '*Obrigatório',
            'required_if' => '*Obrigatório',
            'regex' => 'Utilize um e-mail institucional'
        ];
    }
}
