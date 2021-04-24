<?php

namespace App\Http\Requests\Color;

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
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên màu không để trống',
            'status.required' => 'Trạng thái không được để trống'
        ];
    }
}
