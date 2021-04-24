<?php

namespace App\Http\Requests\Size;

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
            'name' => 'required|unique:banner',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên size không để trống',
            'status.required' => 'Trạng thái không được để trống'
        ];
    }
}
