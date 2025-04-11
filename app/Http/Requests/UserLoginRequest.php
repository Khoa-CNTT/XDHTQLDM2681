<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
            'username_client'         =>  'required',
            'password_client'          =>  'required',

        ];
    }
    public function messages()
    {
        return [
            'username_client.required' => 'Tên tài khoản  không được để trống',
            'password_client.required' => 'Mật khẩu không được để trống'

        ];
    }
}
