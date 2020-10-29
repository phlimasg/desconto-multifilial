<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessoOpcoesRequest extends FormRequest
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
            'renda_ini' => 'required|string|max:250',
            'renda_fim' => 'required|string|max:250',
            'vagas' => 'required|numeric|max:250',
            'percentual' => 'required|string|max:3',
            'processo_id' => 'required|numeric',            
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
