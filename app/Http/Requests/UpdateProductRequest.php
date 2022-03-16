<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name'          => 'required',
            'quantity'      => 'required|numeric',
            'price'         => 'required|numeric',
            'status'        => 'required',
            'author_id'     => 'required',
            'supplier_id'   => 'required',
            'category_id'   => 'required',
            'description'   => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'         => "Vui lòng nhập tên sản phẩm",
            'quantity.required'     => "Vui lòng nhập số lượng ",
            'author_id.required'    => "Vui lòng nhập tác giả của sản phẩm",
            'status.required'       => "Vui lòng nhập trạng thái sản phẩm ",
            'supplier_id.required'  => "Vui lòng nhập nhà cung cấp sản phẩm",
            'category_id.required'  => "Vui lòng chọn danh mục sản phẩm",
            'description.required'  => "Vui lòng nhập mô tả sản phẩm",
            'price.numeric'         => "Vui lòng nhập giá sản phẩm theo dạng số ",
            'price.required'        => "Vui lòng nhập giá sản phẩm  ",
            'quantity.required'     => "Vui lòng nhập số lượng sản phẩm ",
        ];
    }
}
