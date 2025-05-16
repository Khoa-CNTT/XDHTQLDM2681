<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateinformationRequest extends FormRequest
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
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' ,
            'PhoneNumber' => [
                'required',
                'regex:/^0\d{9}$/', // bắt đầu bằng 0 + 9 chữ số = 10 số
            ],
            'Address' => 'required|string|max:255',
            'password' => [
                'nullable',
                'string',
                'min:6',
                'confirmed',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'fullname.required' => 'Họ và tên không được để trống.',
            'username.required' => 'Tên không được để trống.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không đúng định dạng.',
            'PhoneNumber.required' => 'Số điện thoại không được để trống.',
            'PhoneNumber.regex' => 'Số điện thoại phải bắt đầu bằng số 0 và gồm đúng 10 chữ số.',
            'Address.required' => 'Địa chỉ không được để trống.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
        ];
    }
}
