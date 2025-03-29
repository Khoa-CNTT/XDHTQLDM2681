<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResisterUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|string|min:3|max:50|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|max:32|confirmed',
        ];

    }
    public function messages()
    {
        return [
            'username.required' => 'Vui lòng nhập tên tài khoản!',
            'username.unique' => 'Tên tài khoản đã tồn tại!',
            'username.min' => 'Tên tài khoản phải có ít nhất 3 ký tự!',
            'username.max' => 'Tên tài khoản không quá 50 ký tự!',

            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Email không hợp lệ!',
            'email.unique' => 'Email này đã được sử dụng!',

            'password.required' => 'Vui lòng nhập mật khẩu!',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự!',
            'password.max' => 'Mật khẩu không quá 32 ký tự!',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp!',
        ];
    }
}
