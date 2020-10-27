<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicSituacaoHabitacionalRequest extends FormRequest
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
            'tipo_habitacao' => 'required|string|max:250',
            'tipo_habitacao_comodos' => 'required|string|max:250',
            'tipo_moradia' => 'required|string|max:250',
            'tipo_residencia' => 'required|string|max:250',
            'tempo_moradia' => 'required|string|max:250',
            'outras_moradias' => 'required|string|max:250',
            'outras_moradias_vinculo' => 'required|string|max:250',
            'cad_unico' => 'required|string|max:250',
            'condicao_moradia' => 'required|string|max:250'
        ];
    }
}
