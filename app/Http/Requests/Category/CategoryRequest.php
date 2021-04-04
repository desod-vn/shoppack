<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:5|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng không được để tên thư mục trống.',
            'name.min' => 'Vui lòng nhập tên thư mục trên :min ký tự.',
            'name.max' => 'Vui lòng nhập tên thư mục dưới :max ký tự.',
        ];
    }
    
}
