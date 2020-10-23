<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnaliseAsRequest extends FormRequest
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
            'status' => 'string|required|max:240',
            'reside_proximo' => 'string|sometimes|required|max:240',

            'programa_renda_chk' => 'string|sometimes|required|max:240',
            'programa_renda' => 'nullable|string|sometimes|required_if:programa_renda_chk,==,S|max:240|nullable',

            'deficiencia' => 'string|nullable|max:240',
            
            'irmao' => 'string|sometimes|required|max:240',
            'irmao_nome' => 'nullable|sometimes|required_if:irmao,=,S|string|max:240',
            
            'irmao_desconto' => 'string|sometimes|required|max:240',
            'irmao_bolsa' => 'nullable|string|required_if:irmao_desconto,=,S|max:240',

            'renda_bruta' => 'string|sometimes|required|max:240',
            'renda_capita' => 'string|sometimes|required|max:240',
            'numero_familiares' => 'string|sometimes|required|max:240',
            'desconto_sugerido' => 'string|sometimes|required|max:240',
            'desconto_anterior' => 'string|sometimes|required|max:240',
            'parecer' => 'sometimes|required|string|max:100000',
            'public_aluno_id' => 'required|numeric', 

            'msg_interna' => 'string|nullable|max:100000',
            'msg_usuario' => 'string|nullable|required_if:status,==,"Falta Documento"|max:100000',
        ];
    }
    public function messages()
    {
        return [
            'required' => '* :attribute Obrigatório',
            'required_if' => '* :attribute Obrigatório',
            'string' => '* :attribute Insira um texto',
        ];
    }
}
