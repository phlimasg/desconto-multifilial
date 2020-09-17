<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicAlunoRequest extends FormRequest
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
            'ra' => 'required|numeric|max:999999999999999',
            'serie' => 'required|string|max:250',
            'escolaridade' => 'required|string|max:250',
            'nome'=> 'required|string|max:250',
            'nacionalidade'=> 'required|string|max:250',
            'naturalidade'=> 'required|string|max:250',
            'sexo'=> 'required|string|max:250',
            'dt_nasc'=> 'required|date_format:Y-m-d|max:15',
            'email'=> 'required|email|max:250',
            'rua'=> 'required|string|max:250',
            'numero'=> 'required|numeric|max:250',
            'complemento'=> 'required|string|max:250',
            'bairro'=> 'required|string|max:250',
            'cidade'=> 'required|string|max:250',
            'estado'=> 'required|string|max:250',
            'cep'=> 'required|string|max:250',
            'telefone'=> 'required|string|max:250',
            'cpf'=> [
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
            'rg'=> 'required|string|max:250',
            'orgao_emissor'=> 'required|string|max:250',
            'dt_emissor'=> 'required|date_format:Y-m-d|max:15',
            'esc_origem'=> 'required|string|max:250',
            'esc_origem_tipo'=> 'required|string|max:250',
            'esc_origem_desconto'=> 'required|string|max:250',
            'reside_proximo'=> 'required|string|max:250',
            'transp_utilizado'=> 'required|string|max:250',
            'deficiencia'=> 'required|string|max:250',
            'deficiencia_tipo'=> 'required_if:deficiencia,S|nullable|string|max:250',
            'irmao_select'=> 'required|string|max:250',
            'irmao'=> 'required_if:irmao_select,S|nullable|string|max:250',
            'irmao_ra'=> 'required_if:irmao_select,S|nullable|string|max:999999999999999',
            'processo_id'=> 'required|numeric|max:250',
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
