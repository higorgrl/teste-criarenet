<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'rus_rol_id' => ['required', 'exists:roles,rol_id'],
        ];
    }

    public function messages()
    {
        return trans('validation');
    }
}
