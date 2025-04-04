<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRestaurantRequest extends FormRequest
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
            'shopName' => 'required|string|max:255',
            'email' => 'required|email|unique:restaurants,email',
            'phoneNumber' => [
                'required',
                'regex:/^0[0-9]{9,10}$/', // Bắt đầu bằng số 0, có tổng cộng 10 hoặc 11 số
                'unique:restaurants,PhoneNumber',
            ],
            'businessType' => 'required|string|max:255',
            'productDescription' => 'nullable|string|max:500',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'business_license' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tinh' => 'required|string|max:255',
            'quan' => 'required|string|max:255',
            'phuong' => 'required|string|max:255',
            'detailedAddress' => 'required|string|max:500',
        ];
    }
     public function messages()
    {
        return [
            'shopName.required' => 'Tên cửa hàng là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email này đã được sử dụng.',
            'phoneNumber.required' => 'Số điện thoại là bắt buộc.',
            'phoneNumber.digits_between' => 'Số điện thoại phải có từ 10 đến 15 chữ số.',
            'businessType.required' => 'Loại hình kinh doanh là bắt buộc.',
            'logo.required' => 'Ảnh logo là bắt buộc.',
            'logo.image' => 'Logo phải là file ảnh.',
            'business_license.image' => 'Giấy phép kinh doanh phải là file ảnh.',
            'tinh.required' => 'Tỉnh/Thành phố là bắt buộc.',
            'quan.required' => 'Quận/Huyện là bắt buộc.',
            'phuong.required' => 'Phường/Xã là bắt buộc.',
            'detailedAddress.required' => 'Địa chỉ chi tiết là bắt buộc.',
        ];
    }

}
