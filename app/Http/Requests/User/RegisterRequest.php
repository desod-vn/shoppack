<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'username' => 'required|min:3|max:255|unique:users',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng không được để email trống.',
            'email.email' => 'Vui lòng nhập chính xác địa chỉ email.',
        
            'username.required' => 'Vui lòng không được để tên tài khoản trống.',
            'username.min' => 'Vui lòng nhập tên tài khoản trên :min ký tự.',
            'username.max' => 'Vui lòng nhập tên tài khoản dưới :max ký tự.',
            'username.unique' => 'Vui lòng kiểm tra lại, tên tài khoản đã tồn tại.',

            'password.required' => 'Vui lòng không được để  mật khẩu trống.',
            'password.min' => 'Vui lòng nhập mật khẩu trên :min ký tự.',
        ];
    }
}
