<?php

namespace App\Http\Requests\Order;

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
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'note' => 'required',
            'status' => 'required',
            'account_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không để trống',
            'email.required' => 'Email không để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'address.unique' => 'Địa chỉ không được để trống',
            'note.required' => 'Note không được để trống',
            'status.required' => 'Trạng thái không được để trống',
            'account_id.unique' => 'Tên khách hàng không để trống'
        ];
    }
}
