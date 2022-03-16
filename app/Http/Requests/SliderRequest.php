<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'name'  => 'required',
            'image' => 'required',
            'link'  => 'required',
        ];
    }
    public function messages(){
        return [
        'name.required'     => "Vui lòng nhập tên",
        'image.required'    => "Vui lòng thêm ảnh",
        'link.required'     => "Vui lòng nhập link"
        ];
    }
}
