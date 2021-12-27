<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'pes_nome' => ['required', 'max:100'],
            'pes_cpf' => ['required', 'min:11', 'max:11'],
            'pes_telefone' => ['required', 'min:11', 'max:11'],
            'pes_email' => ['required', 'email', 'max:255'],
        ];
    }

    public function messages()
    {
        return trans('validation');
    }

}
