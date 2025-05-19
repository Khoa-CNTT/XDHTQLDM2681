<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOfferRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'discount_type' => 'required|in:percent,fixed',
            'discount_value' => 'required|numeric|min:0',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:0,1',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_global' => 'required|in:0,1',
            'restaurant_ids' => 'nullable|array',
            'restaurant_ids.*' => 'exists:restaurants,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề khuyến mãi.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'discount_type.required' => 'Vui lòng chọn loại giảm giá.',
            'discount_type.in' => 'Loại giảm giá không hợp lệ. Chọn "percent" hoặc "fixed".',
            'discount_value.required' => 'Vui lòng nhập giá trị giảm.',
            'discount_value.numeric' => 'Giá trị giảm phải là một số.',
            'discount_value.min' => 'Giá trị giảm phải lớn hơn hoặc bằng 0.',
            'start_date.required' => 'Vui lòng chọn ngày bắt đầu.',
            'start_date.date' => 'Ngày bắt đầu không hợp lệ.',
            'start_date.after_or_equal' => 'Ngày bắt đầu phải là hôm nay hoặc sau hôm nay.',
            'end_date.required' => 'Vui lòng chọn ngày kết thúc.',
            'end_date.date' => 'Ngày kết thúc không hợp lệ.',
            'end_date.after_or_equal' => 'Ngày kết thúc phải bằng hoặc sau ngày bắt đầu.',
            'status.required' => 'Vui lòng chọn trạng thái hiển thị.',
            'status.in' => 'Giá trị trạng thái không hợp lệ.',
            'image.image' => 'File tải lên phải là hình ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg hoặc gif.',
            'image.max' => 'Kích thước ảnh không vượt quá 2MB.',
            'is_global.required' => 'Vui lòng chọn hình thức áp dụng (toàn hệ thống hoặc nhà hàng cụ thể).',
            'is_global.in' => 'Giá trị áp dụng toàn hệ thống không hợp lệ.',
            'restaurant_ids.array' => 'Danh sách nhà hàng phải là mảng.',
            'restaurant_ids.*.exists' => 'Một hoặc nhiều nhà hàng không tồn tại trong hệ thống.',
        ];
    }
}
