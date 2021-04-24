<?php

namespace App\Http\Requests\Account;

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
            'name' => 'required|unique:account',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'role' => 'required',
            'address' => 'required',
            'status' => 'required'
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không để trống',
            'email.required' => 'Email không để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'password.unique' => 'Mật khẩu không được để trống',
            'role.required' => 'Trạng thái không được để trống',
            'address.unique' => 'Danh mục đã có trong CSDL',
            'status.required' => 'Trạng thái không được để trống'
        ];
    }
}
