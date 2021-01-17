<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            // 'user_email' => 'required|unique:users,user_email,'.$this->user_id,
            'user_email' => 'required|unique:users,user_email,'.$this->id.',user_id',
            'user_fullname'=>'required|max:50',
            'user_address'=>'required',
            // 'user_address'=>'required|unique:users,user_address,'.$this->user_id,
            'user_phone'=>'required|max:10|min:10',
        ];
    }
    public function messages()
    {
        return[
            'user_email.required'=>'Vui lòng nhập tài khoản',
            'user_fullname.required'=>'Vui lòng nhập tên quản trị',
            'user_fullname.max'=>'Tên quản trị không quá 50 ký tự',
            'user_address.required'=>'Vui lòng nhập địa chỉ quản trị',
            'user_address.unique'=>'Địa chỉ người dùng đã được sử dụng.',
            'user_phone.required'=>'Vui lòng nhập số điện thoại quản trị',
            'user_phone.max'=>'Số điện thoại quản trị tối đa 10 số',
            'user_phone.min'=>'Số điện thoại quản trị phải có ít nhất 10 ký tự.'
        ];
    }
}
