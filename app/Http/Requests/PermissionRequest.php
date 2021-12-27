<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'per_name' => ['required', 'max:50'],
            'per_label' => ['required', 'max:200'],
        ];
    }

    public function messages()
    {
        return trans('validation');
    }
}
