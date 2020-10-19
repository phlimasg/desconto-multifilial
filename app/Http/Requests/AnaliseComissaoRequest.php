<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnaliseComissaoRequest extends FormRequest
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
            'desconto_sugerido' => 'string|required|max:240',
            'msg_interna' => 'string|nullable|max:100000',
            'msg_usuario' => 'string|nullable|required_if:status,==,"Falta Documento"|max:100000',
        ];
    }
}
