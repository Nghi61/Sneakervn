<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RuleUser extends FormRequest
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
            'name'=>['required','string','min:3',],
            'email'=>['required',Rule::unique('users')->ignore($this->route('user'))],
            'phone'=>['required','numeric','digits:10',Rule::unique('users')->ignore($this->route('user'))],
            'password'=>['required','min:6','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
            'avatar' => '|image|mimes:jpeg,png,jpg,gif',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập họ tên',
            'name.string'=>'Vui lòng nhập họ tên là chuỗi',
            'name.min' => 'Tên phải có ít nhất 3 ký tự',
            'email.required' => 'Vui lòng nhập email.',
            'email.unique' => 'Email đã tồn tại',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.digits' => 'Số điện thoại phải là 10 số',
            'phone.numeric' => 'Số điện thoại phải là số',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.regex' => 'Mật khẩu phải bao gồm chữ hoa và số',
            'password.min' => 'Mật khẩu ít nhất là 6 kí tự',
            'avatar.image' => 'Tệp tải lên phải là hình ảnh',
            'avatar.mimes' => 'Định dạng tệp không hợp lệ. Chỉ chấp nhận các định dạng có đuôi là jpeg,png,jpg,gif',
        ];
}
}
