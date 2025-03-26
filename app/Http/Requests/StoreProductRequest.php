<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:200',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'required',
            'sku' => 'required|string|max:100|unique:products,sku',
            'brand_id' => 'required|integer|exists:brands,id',
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'nullable|string',
            'weight' => 'nullable|numeric|min:0',
            'quantity_warning' => 'nullable|integer|min:0',
            'tags' => 'nullable|string|max:200',
            'instructional_images' => 'nullable',
            'images' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống.',
            'quantity.required' => 'Số lượng không được để trống.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
            'price.required' => 'Giá sản phẩm không được để trống.',
            'price.numeric' => 'Giá phải là số hợp lệ.',
            'image.required' => 'Hình ảnh sản phẩm không được để trống.',
            'sku.required' => 'Mã SKU không được để trống.',
            'sku.unique' => 'Mã SKU đã tồn tại.',
            'brand_id.required' => 'Thương hiệu không được để trống.',
            'brand_id.exists' => 'Thương hiệu không hợp lệ.',
            'category_id.required' => 'Danh mục không được để trống.',
            'category_id.exists' => 'Danh mục không hợp lệ.',
        ];
    }
}
