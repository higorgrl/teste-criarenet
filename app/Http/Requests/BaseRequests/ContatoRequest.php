<?php

namespace App\Http\Requests\BaseRequests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'ctt_telefone' => 'required|size:15|celular_com_ddd',
            'ctt_email' => ['required', 'email', 'max:255'],
        ];

        return $rules;
    }
}
