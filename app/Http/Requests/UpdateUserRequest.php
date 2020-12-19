<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'user_email'=>'required|email',
            'user_password'=>'required|min:8|max:30',
            'user_fullname'=>'required|max:50',
            'user_address'=>'required',
            'user_phone'=>'required|max:10',
            'user_level'=>'required'
        ];
    }
}
