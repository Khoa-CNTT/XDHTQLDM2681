<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title'  => 'sometimes|required|string|max:100',
            'status' => 'sometimes|required|boolean'
        ];
    }

    public function messages()
    {
        return [
            'title.required'  => 'Tiêu đề không được để trống.',
            'title.string'    => 'Tiêu đề phải là chuỗi ký tự.',
            'title.max'       => 'Tiêu đề không được quá 100 ký tự.',
            'status.required' => 'Trạng thái không được để trống.',
            'status.boolean'  => 'Trạng thái phải là true hoặc false.'
        ];
    }
}
