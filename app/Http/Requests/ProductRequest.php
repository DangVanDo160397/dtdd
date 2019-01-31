<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'Tên sản phẩm',
            'price' => 'Giá',
            'screen_size' => 'Kích thước màn hình',
            'operating_system' => 'Hệ điều hành',
            'cpu' => 'Chip',
            'ram' => 'Ram',
            'camera' => 'Máy ảnh',
            'memories' => 'Bộ nhớ',
            'pin' => 'Pin',
            'status' => 'Trạng thái',
            'cat_id' => 'Hãng',
            'thumbnail' => 'Ảnh',
        ];

    }
    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được quá :max ký tự',
            'min' => ':attribute không được ít hơn :min ký tự',
            'numeric' => ':attribute phải là số',
        ];
    }
    public function rules()
    {
        return [
            'name' => 'required|min:6|max:255',
            'price' => 'required|numeric|min:1',
            'screen_size' => 'required|min:1',
            'operating_system' => 'required',
            'cpu' => 'required',
            'ram' => 'required',
            'camera' => 'required',
            'memories' => 'required',
            'pin' => 'required',
            'status' => 'required',
            'cat_id' => 'required',
            'thumbnail' => 'required',
        ];
    }
}
