<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicFiliacaoRequest extends FormRequest
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
            'mae_nome' => 'required|string|max:250',
            'mae_cpf' => [
                function ($attribute, $value, $fail){
                    if(empty($value)) {
                        $fail('CPF INVÁLIDO');
                    }
                    $value = preg_replace("/[^0-9]/", "", $value);
                    $value = str_pad($value, 11, '0', STR_PAD_LEFT);
                    if (strlen($value) != 11) {
                        $fail('CPF INVÁLIDO');
                    }
                    else if ($value == '00000000000' ||
                        $value == '11111111111' ||
                        $value == '22222222222' ||
                        $value == '33333333333' ||
                        $value == '44444444444' ||
                        $value == '55555555555' ||
                        $value == '66666666666' ||
                        $value == '77777777777' ||
                        $value == '88888888888' ||
                        $value == '99999999999') {
                        $fail('CPF INVÁLIDO');
                    } else {
                        for ($t = 9; $t < 11; $t++) {
                            for ($d = 0, $c = 0; $c < $t; $c++) {
                                $d += $value{$c} * (($t + 1) - $c);
                            }
                            $d = ((10 * $d) % 11) % 10;
                            if ($value{$c} != $d) {
                                $fail('CPF INVÁLIDO');
                            }
                        }
                    }
                }
            ],
            'mae_rg' => 'required|string|max:250',
            'mae_dt_nasc' => 'required|string|max:250',
            'mae_telefone' => 'required|string|max:250',
            'mae_tipo_guarda' => 'required|string|max:250',
            'pai_nome' => 'nullable|string|max:250',
            'pai_cpf' => 'nullable|string|max:250',
            'pai_rg' => 'nullable|string|max:250',
            'pai_dt_nasc' => 'nullable|string|max:250',
            'pai_telefone' => 'nullable|string|max:250',
            'pai_tipo_guarda' => 'nullable|string|max:250',
            //'public_aluno_id' => 'required|string|max:250',
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
