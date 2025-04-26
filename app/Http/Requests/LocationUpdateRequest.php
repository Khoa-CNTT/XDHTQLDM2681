<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationUpdateRequest extends FormRequest
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
            'City' => 'required|string|max:100',
            'District' => 'required|string|max:100',
            'Ward' => 'required|string|max:100',
            'Address' => 'required|string|max:255',
        ];
    }
    public function messages(): array
    {
        return [
            'City.required' => 'Vui lòng chọn Tỉnh/Thành phố.',
            'District.required' => 'Vui lòng chọn Quận/Huyện.',
            'Ward.required' => 'Vui lòng chọn Phường/Xã.',
            'Address.required' => 'Vui lòng nhập địa chỉ.',
        ];
    }
}
