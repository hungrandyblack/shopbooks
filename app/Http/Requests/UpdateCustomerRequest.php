<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'phone'     => 'required',
            'gender'    => 'required',
            'address'   => 'required',
        ];
        
    }
    public function messages(){
        return [
            'name.required'         => 'Vui lòng nhập tên khách hàng ',
            'email.required'        => 'Vui lòng nhập email khách hàng',
            'phone.required'        => 'Vui lòng nhập số điện thoại khách hàng',
            'gender.required'       => 'Vui lòng nhập giới tính khách hàng ',
            'address.required'      => 'Vui lòng nhập địa chỉ khách hàng  ',
        ];
    }
}
