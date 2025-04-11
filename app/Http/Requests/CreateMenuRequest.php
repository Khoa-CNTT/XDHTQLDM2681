<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMenuRequest extends FormRequest
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
            'restaurant_id' => 'required|exists:restaurants,id',
            'category_id' => 'required|exists:categories,id',
            'Title_items' => 'required|string|max:255',
            'Price' => 'required|numeric|min:0',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'Quantity' => 'required|integer|min:1',
            'Status' => 'required|in:0,1',
            'description' => 'nullable|string',
        ];
    }
    public function messages(): array
    {
        return [
            'restaurant_id.required' => 'Vui lòng chọn nhà hàng.',
            'restaurant_id.exists' => 'Nhà hàng không tồn tại.',

            'category_id.required' => 'Vui lòng chọn danh mục.',
            'category_id.exists' => 'Danh mục không tồn tại.',

            'Title_items.required' => 'Tiêu đề món ăn là bắt buộc.',
            'Title_items.string' => 'Tiêu đề món ăn phải là chuỗi.',
            'Title_items.max' => 'Tiêu đề món ăn không được vượt quá 255 ký tự.',

            'Price.required' => 'Giá món ăn là bắt buộc.',
            'Price.numeric' => 'Giá món ăn phải là một số.',
            'Price.min' => 'Giá món ăn không được nhỏ hơn 0.',

            'Image.image' => 'File tải lên phải là hình ảnh.',
            'Image.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg, gif.',

            'Quantity.required' => 'Số lượng là bắt buộc.',
            'Quantity.integer' => 'Số lượng phải là số nguyên.',
            'Quantity.min' => 'Số lượng tối thiểu là 1.',

            'Status.required' => 'Vui lòng chọn trạng thái.',
            'Status.in' => 'Trạng thái không hợp lệ.',

            'description.string' => 'Mô tả phải là chuỗi.',
        ];
    }
}
