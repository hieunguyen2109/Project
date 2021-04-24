<?php

namespace App\Http\Requests\Banner;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|unique:banner',
            'image' => 'required',
            'link' => 'required',
            'description' => 'required',
            'status' => 'required',
            'prioty' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không để trống',
            'image.required' => 'Ảnh không để trống',
            'link.required' => 'Đường dẫn không được để trống',
            'description.unique' => 'Nội dung không được để trống',
            'status.required' => 'Trạng thái không được để trống',
            'prioty.unique' => 'Thứ tự ưu tiên không để trống'
        ];
    }
}
