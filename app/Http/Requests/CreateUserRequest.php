<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'user_email'=>'required',
            'user_password'=>'required|min:8|max:30',
            'user_fullname'=>'required|max:50',
            'user_address'=>'required',
            'user_phone'=>'required|max:10',
            'user_level'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'user_email.required'=>'Vui lòng nhập tài khoản',
            'user_password.required'=>'Vui lòng nhập mật khẩu',
            'user_password.min'=>'Vui lòng nhập khẩu tối thiểu 8 ký tự',
            'user_password.max'=>'Mật khẩu tối đa 12 ký tự',
            'user_fullname.required'=>'Vui lòng nhập tên quản trị',
            'user_fullname.max'=>'Tên quản trị không quá 50 ký tự',
            'user_address.required'=>'Vui lòng nhập địa chỉ quản trị',
            'user_phone.required'=>'Vui lòng nhập số điện thoại quản trị',
            // 'user_phone.min'=>'Số điện thoại quản trị tối thiểu 10 số',
            'user_phone.max'=>'Số điện thoại quản trị tối đa 10 số',
            'user_level.required'=>'Vui lòng nhập quyền quản trị',
        ];
    }
}
