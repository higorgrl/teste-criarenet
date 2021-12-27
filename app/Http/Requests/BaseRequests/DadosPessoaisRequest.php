<?php

namespace App\Http\Requests\BaseRequests;

use Illuminate\Foundation\Http\FormRequest;

class DadosPessoaisRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'dps_nome' => ['required', 'max:100'],
        ];
        return $rules;
    }
}
