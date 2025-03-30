<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class RegisterShipperRequest extends FormRequest
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
            'username' => ['required', 'unique:drivers'],
            'email' => ['required', 'email', 'unique:drivers'],
            'phonenumber' => ['required', 'numeric', 'unique:drivers'],
            'fullname' => ['required', 'string'],
            'dateofbirth' => [
                'required',
                'date',
                'before_or_equal:' . Carbon::now()->subYears(18)->format('Y-m-d') // Phải đủ 18 tuổi trở lên
            ],
            'vehicle_type' => ['nullable', 'string'],
            'license_plate' => ['nullable', 'string'],
            'id_card' => ['nullable', 'string']
        ];
    }
    public function messages(): array
    {
        return [
            'username.required' => 'Tên đăng nhập không được để trống.',
            'username.unique' => 'Tên đăng nhập đã tồn tại.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã được đăng ký.',
            'phonenumber.required' => 'Số điện thoại không được để trống.',
            'phonenumber.numeric' => 'Số điện thoại phải là số.',
            'phonenumber.unique' => 'Số điện thoại đã được sử dụng.',
            'fullname.required' => 'Họ và tên không được để trống.',
            'dateofbirth.required' => 'Ngày sinh không được để trống.',
            'dateofbirth.date' => 'Ngày sinh không hợp lệ.',
            'dateofbirth.before_or_equal' => 'Bạn phải đủ 18 tuổi trở lên.',
            'id_card.required' => 'CMND không được để trống.',

        ];
    }
}
