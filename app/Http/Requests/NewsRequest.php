<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
    public function attributes(){
        return [
            'title' => 'Tiêu đề',
            'description' => 'Mô tả ngắn',
            'content' => 'Nội dung'
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được quá :max ký tự',
            'min' => ':attribute không được ít hơn :min ký tự'
        ];
    }
    public function rules()
    {
        return [
            'title' => 'required|min:6',
            'content' => 'required',
            'description' => 'required',
        ];
    }
}
