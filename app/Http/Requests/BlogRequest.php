<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogRequest extends FormRequest
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
            'title'=>['required','string','min:3',Rule::unique('blog')->ignore($this->route('blog'))],
            'urlHinh' => 'image|mimes:jpeg,png,jpg,gif',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề bài viết.',
            'title.string'=>'Vui lòng nhập tiêu đề là chuỗi',
            'title.min' => 'Tiêu đề phải có ít nhất 3 ký tự.',
            'title.unique'=>'Tiêu đề bài viết đã tồn tại',
            'urlHinh.required' => 'Vui lòng tải lên ít nhất một tệp hình',
            'urlHinh.image' => 'Tệp tải lên phải là hình ảnh.',
            'urlHinh.mimes' => 'Định dạng tệp không hợp lệ. Chỉ chấp nhận các định dạng có đuôi là jpeg,png,jpg,gif',
        ];
}

}
