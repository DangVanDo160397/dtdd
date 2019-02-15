<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'Tên đăng nhập',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'password_confirmation' => 'Mật khẩu nhập lại',
            'email' => 'Email'
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được quá :max ký tự',
            'min' => ':attribute không được ít hơn :min ký tự',
            'confirmed' => 'Xác nhận mật khẩu không khớp',
            'email' => 'Địa chỉ email không hợp lệ',
            'unique' => ':attribute đã tồn tại'
        ];
    }
    public function rules()
    {
        return [
            'name' => 'required|min:6|max:255',
            'password' => 'required|min:6|max:12|confirmed',
            'password_confirmation'=> 'required|min:6|max:12',
            'email' => 'required|min:6|max:255|email|unique:users'
        ];
    }
}
