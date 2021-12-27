<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'pro_rol_id' => ['required', 'exists:roles,rol_id'],
            'pro_per_id' => ['required', 'exists:permissions,per_id'],
        ];
    }

    public function messages()
    {
        return trans('validation');
    }
}
