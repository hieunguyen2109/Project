<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|unique:product,name,'.request()->id,
            'file_upload' => 'required',
            'image_list' => 'required',
            'price' => 'required',
            'sale_price' => 'required',
            'description' => 'required',
            'status' => 'required',
            'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không để trống',
            'file_upload.required' => 'Thứ tự ưu tiên không để trống',
            'image_list.unique' => 'Danh mục đã có trong CSDL',
            'price.required' => 'Tên danh mục không để trống',
            'sale_price.required' => 'Thứ tự ưu tiên không để trống',
            'description.unique' => 'Danh mục đã có trong CSDL',
            'status.required' => 'Tên danh mục không để trống',
            'category_id.required' => 'Thứ tự ưu tiên không để trống',
        ];
    }
}
