<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Vui lòng không được để tên tài khoản trống.',

            'password.required' => 'Vui lòng không được để  mật khẩu trống.',
        ];
    }
}
