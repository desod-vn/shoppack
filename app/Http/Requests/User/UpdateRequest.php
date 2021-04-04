<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'address' => 'required|min:10',
            'birthday' => 'required',
            'phone' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'Vui lòng không được để tên trống.',
            'firstname.string' => 'Vui lòng kiểm tra lại, tên phải là một chuỗi.',

            'lastname.required' => 'Vui lòng không được để họ trống.',
            'lastname.string' => 'Vui lòng kiểm tra lại, họ phải là một chuỗi.',

            'address.required' => 'Vui lòng không được để địa chỉ trống.',
            'address.min' => 'Địa chỉ bạn nhập không đúng, vui lòng nhập địa chỉ trên :min ký tự.',

            'birthday.required' => 'Vui lòng không được để ngày sinh trống.',

            'phone.required' => 'Vui lòng không được để số điện thoại trống.',
            'phone.numeric' => 'Số điện thoại không đúng, vui lòng chỉ nhập số điện thoại.',
        ];
    }
}
