<?php

namespace App\Http\Requests\Blog;

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
            'description' => 'required',
            'sumary' => 'required',
            'status' => 'required',
            'account_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không để trống',
            'image.required' => 'Ảnh không để trống',
            'description.required' => 'Nội dung không được để trống',
            'sumary.unique' => '...không được để trống',
            'status.required' => 'Trạng thái không được để trống',
            'account_id.unique' => 'Tên khách hàng không để trống'
        ];
    }
}
