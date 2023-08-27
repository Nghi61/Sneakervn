<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RuleProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required','string','min:3',Rule::unique('products')->ignore($this->route('product'))],
            'price'=>['required','min:1','numeric'],
            'sale'=>['nullable','numeric','min:1','lt:price'],
            'quantity'=>['required','numeric','min:1'],
            'size' => ['required','sizes_sum:quantity'],
            'idcate' => ['required', 'array', 'min:1'],
            'urlHinh' => '|image|mimes:jpeg,png,jpg,gif',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'name.string'=>'Vui lòng nhập tên là chuỗi',
            'name.min' => 'Tên sản phẩm phải có ít nhất 3 ký tự.',
            'name.unique'=>'Tên sản phẩm đã tồn tại',
            'size.required' => 'Vui lòng số lượng cho size.',
            'size.sizes_sum' => 'Số lượng của size nhập không khớp với số lượng sản phẩm',
            'price.required' => 'Vui lòng nhập giá sản phẩm.',
            'price.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 1',
            'price.numeric' => 'Giá sản phẩm phải là số.',
            'sale.min' => 'Giá giảm giá phải lớn hơn hoặc bằng 1',
            'sale.lt' => 'Giá giảm giá phải nhỏ hơn giá gốc.',
            'sale.numeric' => 'Giá giảm giá phải là số.',
            'quantity.required' => 'Vui lòng nhập số lượng sản phẩm.',
            'quantity.numeric' => 'Số lượng sản phẩm phải là số.',
            'quantity.min' => 'Số lượng sản phẩm phải lớn hơn hoặc bằng 1',
            'idcate.required' => 'Vui lòng chọn ít nhất một danh mục.',
            'idcate.array' => 'Dữ liệu danh mục không hợp lệ.',
            'idcate.min' => 'Vui lòng chọn ít nhất một danh mục.',
            'urlHinh.required' => 'Vui lòng tải lên ít nhất một tệp hình',
            'urlHinh.image' => 'Tệp tải lên phải là hình ảnh.',
            'urlHinh.mimes' => 'Định dạng tệp không hợp lệ. Chỉ chấp nhận các định dạng có đuôi là jpeg,png,jpg,gif',
        ];
}

}
