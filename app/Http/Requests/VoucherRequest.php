<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoucherRequest extends FormRequest
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
            'code' => 'required|unique:vouchers,code|max:50',
            'title' => 'required|max:255',
            'voucher_type' => 'required|in:discount,freeship',
            'value' => 'required|numeric|min:0',
            'discount_type' => 'required|in:amount,percent',
            'min_order_value' => 'nullable|numeric|min:0',
            'max_discount_value' => 'nullable|numeric|min:0',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'limit' => 'required|integer|min:1',
            'is_active' => 'required|boolean'
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Vui lòng nhập mã voucher',
            'code.unique' => 'Mã voucher đã tồn tại',
            'code.max' => 'Mã voucher không được vượt quá 50 ký tự',
            'title.required' => 'Vui lòng nhập tiêu đề voucher',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự',
            'voucher_type.required' => 'Vui lòng chọn loại voucher',
            'voucher_type.in' => 'Loại voucher không hợp lệ',
            'value.required' => 'Vui lòng nhập giá trị voucher',
            'value.numeric' => 'Giá trị voucher phải là số',
            'value.min' => 'Giá trị voucher phải lớn hơn 0',
            'discount_type.required' => 'Vui lòng chọn loại giảm giá',
            'discount_type.in' => 'Loại giảm giá không hợp lệ',
            'min_order_value.numeric' => 'Giá trị đơn hàng tối thiểu phải là số',
            'min_order_value.min' => 'Giá trị đơn hàng tối thiểu phải lớn hơn 0',
            'max_discount_value.numeric' => 'Giá trị giảm tối đa phải là số',
            'max_discount_value.min' => 'Giá trị giảm tối đa phải lớn hơn 0',
            'start_date.required' => 'Vui lòng chọn ngày bắt đầu',
            'start_date.date' => 'Ngày bắt đầu không hợp lệ',
            'start_date.after_or_equal' => 'Ngày bắt đầu phải từ ngày hiện tại trở đi',
            'end_date.required' => 'Vui lòng chọn ngày kết thúc',
            'end_date.date' => 'Ngày kết thúc không hợp lệ',
            'end_date.after' => 'Ngày kết thúc phải sau ngày bắt đầu',
            'limit.required' => 'Vui lòng nhập giới hạn sử dụng',
            'limit.integer' => 'Giới hạn sử dụng phải là số nguyên',
            'limit.min' => 'Giới hạn sử dụng phải lớn hơn 0',
            'is_active.required' => 'Vui lòng chọn trạng thái',
            'is_active.boolean' => 'Trạng thái không hợp lệ'
        ];
    }
}
