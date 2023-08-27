<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RuleCategories extends FormRequest
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
    public function rules()
    {
        $id = $this->route('category');

        return [
            'name' => [
                'required',
                'string',
                'min:3',
                Rule::unique('categories')->ignore($id),
            ],
            'slug' => [
                Rule::unique('categories')->ignore($id),
            ],
            // Thêm các quy tắc xác thực khác
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên danh mục.',
            'name.string'=>'Vui lòng nhập kí tự đặc biệt',
            'name.min' => 'Tên danh mục phải có ít nhất 3 ký tự.',
            'name.unique'=>'Danh mục đã tồn tại',
            'slug.unique'=>'slug đã tồn tại',
        ];
}
}
