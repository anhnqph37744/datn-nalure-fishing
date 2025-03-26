<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'tieu_de'=>'required|unique:banners,tieu_de|max:255',
            'noi_dung' => 'required|string|max:1000',
            'list_image' => 'required',
            'list_image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'trang_thai' => 'required|in:hien,an',
        ];
    }



    public function messages(): array
    {
        return [
            'list_image'=>'Ảnh banner không được bỏ trống',
            'list_image.*.required' => 'Ảnh banner không được bỏ trống',
            'list_image.*.max' => 'Ảnh vượt quá 1000 ký tự',
            'list_image.*.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, hoặc gif.',
            'tieu_de.required' => 'Tiêu đề banner không được bỏ trống',
            'tieu_de.unique' => 'Tiêu đề banner đã tồn tại',
            'tieu_de.max' => 'Tiêu đề banner vượt quá 255 ký tự',
            'noi_dung.required' => 'Nội dung không được bỏ trống',
            'noi_dung.max' => 'Nội dung vượt quá 1000 ký tự',
            'hinh_anh.required' => 'Ảnh banner không được bỏ trống',
        ];
    }
}
