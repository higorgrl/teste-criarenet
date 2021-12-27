<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'rol_name' => ['required', 'max:50'],
            'rol_label' => ['required', 'max:200'],
        ];
    }

    public function messages()
    {
        return trans('validation');
    }
}
