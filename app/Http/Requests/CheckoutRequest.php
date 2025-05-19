<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'fullname' => ['nullable', 'string', 'max:255'],
            'PhoneNumber' => ['required', 'regex:/^0[0-9]{9}$/'],
        ];
    }

    public function messages(): array
    {
        return [
            'PhoneNumber.required' => 'Vui lòng nhập số điện thoại.',
            'PhoneNumber.regex' => 'Số điện thoại không đúng định dạng (phải có 10 chữ số và bắt đầu bằng số 0).',
            'fullname.max' => 'Tên không được vượt quá 255 ký tự.',
        ];
    }
}
