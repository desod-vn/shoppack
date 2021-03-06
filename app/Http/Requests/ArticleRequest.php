<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5|max:255',
            'content' => 'required|min:100'
        ];
    }

    public function messages()
    {
        return [
            'name.require' => 'Tên bài viết không được để trống.',
            'name.min' => 'Tên bài viết chứa tối thiếu :min ký tự.',
            'name.max' => 'Tên bài viết chứa tối đa :max ký tự.'
        ]
    }
}
