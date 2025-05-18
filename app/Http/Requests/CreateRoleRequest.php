<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest
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
            'name' => 'required|string|max:3',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên quyền là bắt buộc.',
            'name.string' => 'Tên quyền phải là chuỗi.',
            'name.max' => 'Tên quyền không được vượt quá 3 ký tự.',
        ];
    }
}
