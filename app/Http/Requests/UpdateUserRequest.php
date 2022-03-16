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
            'name'      => 'required',
            'email'     => 'required',
            'password'  => 'required',
            'role'      => 'required',
            'phone'     => 'required',
            'gender'    => 'required',
            'address'   => 'required',
            'birthday'  => 'required'
        ];
    }
    public function messages(){
        return [

            'name.required'     => "Vui lòng nhập tên ",
            'email.required'    => "Vui lòng nhập email ",
            'password.required' => "Vui lòng nhập mật khẩu",
            'role.required'     => "Vui lòng nhập vai trò",
            'phone.required'    => "Vui lòng nhập số điện thoại",
            'gender.required'   => "Vui lòng nhập giới tính ",
            'address.required'  => "Vui lòng nhập địa chỉ  ",
            'birthday.required' => "Vui lòng nhập ngày sinh "
        ];
    }
}
