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
            'code' => 'required|unique:vouchers,code|max:255',  // Mã voucher là duy nhất và không vượt quá 255 ký tự
            'title' => 'nullable|max:255',  // Tiêu đề không bắt buộc, nhưng nếu có thì không vượt quá 255 ký tự
            'voucher_type' => 'required|in:discount,freeship',  // Loại voucher phải là 'discount' hoặc 'freeship'
            'value' => 'required|numeric',  // Giá trị voucher phải là một số
            'discount_type' => 'required|in:percent,amount',  // Kiểu giảm giá phải là 'percent' hoặc 'amount'
            'min_order_value' => 'nullable|numeric',  // Giá trị đơn hàng tối thiểu (không bắt buộc)
            'max_discount_value' => 'nullable|numeric',  // Giảm giá tối đa (không bắt buộc)
            'start_date' => 'nullable|date',  // Ngày bắt đầu phải là một ngày hợp lệ
            'end_date' => 'nullable|date|after_or_equal:start_date',  // Ngày kết thúc phải là ngày hợp lệ và không được trước ngày bắt đầu
            'limit' => 'required|integer|min:1',  // Giới hạn voucher phải là một số nguyên và lớn hơn hoặc bằng 1
            
        ];
    }
}
