<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicRedeDeAbastecimentoRequest extends FormRequest
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
            'esgoto' => 'required|string|max:250',
            'sanitaria' => 'required|string|max:250',
            'agua' => 'required|string|max:250',
            'energia' => 'required|string|max:250',            
        ];
    }
}
