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
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'PhoneNumber' => 'nullable|string|max:10',
            'Address' => 'nullable|string|max:255',
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
            'username.required' => 'Tên không được để trống.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không đúng định dạng.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
        ];
    }
}
