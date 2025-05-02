<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttackment;
use App\Models\Variant;
use App\Models\VariantAttributeValue;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $base_url = "admin.pages.product.";
    public function index()
    {
        $products = Product::with(['category', 'images', 'brand', 'variant.varianAttributeValue.attribute', 'variant.varianAttributeValue.attributeValue'])
            ->withSum('orderDetails', 'quantity')
            ->orderBy('id', 'DESC')
            ->get();
        return view($this->base_url . __FUNCTION__, compact('products'));
    }
    public function edit($id)
    {
        $product = Product::with(['category', 'images', 'brand', 'variant.varianAttributeValue.attribute', 'variant.varianAttributeValue.attributeValue'])
            ->withSum('orderDetails', 'quantity')
            ->findOrFail($id);

        if (!$product->active) {
            return redirect()->route('admin.product.index')
                ->with('error', 'Không thể chỉnh sửa sản phẩm đã bị vô hiệu hóa!');
        }

        if ($product->order_details_sum_quantity > 0) {
            return redirect()->route('admin.product.index')
                ->with('error', 'Không thể chỉnh sửa sản phẩm đã có đơn hàng!');
        }

        $category = Category::orderBy('id', 'DESC')->get();
        $brand = Brand::orderBy('id', 'DESC')->get();
        $attribute = Attribute::orderBy('id', 'DESC')->get();
        $attribute_value = AttributeValue::orderBy('id', 'DESC')->get();
        return view($this->base_url . __FUNCTION__,compact('product','category','brand','attribute','attribute_value'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'quantity' => 'required|integer|min:1',
            'quantity_warning' => 'nullable|integer|min:1',
            'weight' => 'nullable',
            'tags' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required',
            'images' => 'nullable|array',
        ], [
            'name.required' => 'Tên sản phẩm không được để trống.',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'price.required' => 'Giá sản phẩm là bắt buộc.',
            'quantity.required' => 'Số lượng sản phẩm là bắt buộc.',
            'quantity.min' => 'Số lượng sản phẩm không thể nhỏ hơn :min.',
            'quantity_warning.integer' => 'Số lượng cảnh báo phải là số nguyên.',
            'quantity_warning.min' => 'Số lượng cảnh báo không thể nhỏ hơn 0.',
            'tags.max' => 'Tags không được vượt quá 255 ký tự.',
            'category_id.required' => 'Danh mục sản phẩm là bắt buộc.',
            'brand_id.required' => 'Thương hiệu sản phẩm là bắt buộc.',
        ]);
        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'sku' => $request->sku,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'quantity_warning' => $request->quantity_warning,
            'weight' => $request->weight,
            'tags' => $request->tags,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
        ]);

        if ($request->hasFile('image')) {
            if ($product->image && file_exists(public_path('storage/products/' . $product->image))) {
                unlink(public_path('storage/products/' . $product->image));
            }
            $imageName = $this->uploadImage($request->file('image'), 'storage/product/');
            $product->image = $imageName;
            $product->save();
        }

        if ($request->has('variants')) {
            foreach ($request->variants as $variantData) {
                $variant = Variant::updateOrCreate(
                    ['sku' => $variantData['sku'], 'product_id' => $product->id],
                    [
                        'price' => $variantData['price'],
                        'quantity' => $variantData['quantity'],
                        'weight' => $variantData['weight'],
                        'description' => $variantData['description'],
                    ]
                );

                if (isset($variantData['image']) && $variantData['image'] instanceof \Illuminate\Http\UploadedFile) {
                    if ($variant->image && file_exists(public_path('storage/variant/' . $variant->image))) {
                        unlink(public_path('storage/variant/' . $variant->image));
                    }
                    $variantImage = $variantData['image'];
                    $variantImageName = $this->uploadImage($variantImage, 'storage/variant/');
                    $variant->image = $variantImageName;
                    $variant->save();
                }
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $this->uploadImage($image, 'storage/attackment/');
                ProductAttackment::create([
                    'product_id' => $product->id,
                    'image_url' => $imageName,
                ]);
            }
        }

        return redirect()->route('admin.product.index')->with('success', 'Sản phẩm cập nhật thành công!');
    }
    public function destroy($id)
    {
        $product = Product::withSum('orderDetails', 'quantity')->find($id);
        
        if (!$product->active) {
            return redirect()->route('admin.product.index')->with('error', 'Không thể xóa sản phẩm đã bị vô hiệu hóa!');
        }

        if ($product->order_details_sum_quantity > 0) {
            return redirect()->route('admin.product.index')->with('error', 'Không thể xóa sản phẩm đã có đơn hàng!');
        }

        $images = ProductAttackment::where('product_id', $id)->get();
        $variant = Variant::where('product_id', $id)->get();
        foreach ($images as $img) {
            ProductAttackment::find($img->id)->delete();
        }
        foreach ($variant as $v) {
            VariantAttributeValue::where('variant_id', $v->id)->delete();
            $v->delete();
        }
        $product->delete();
        return redirect()->route('admin.product.index')->with('messages', 'Xoá sản phẩm thành công');
    }
    public function attributeValueData($id)
    {
        $attribute_value = AttributeValue::where('attribute_id', $id)->get();
        return response()->json($attribute_value);
    }
    public function create()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        $brand = Brand::orderBy('id', 'DESC')->get();
        $attribute = Attribute::orderBy('id', 'DESC')->get();
        $attribute_value = AttributeValue::orderBy('id', 'DESC')->get();
        return view('admin.pages.product.create', compact('category', 'brand', 'attribute', 'attribute_value'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'quantity' => 'required|integer|min:1',
            'quantity_warning' => 'nullable|integer|min:1',
            'weight' => 'nullable',
            'tags' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required',
            'image' => 'required|image',
            'images' => 'nullable|array',
        ], [
            'name.required' => 'Tên sản phẩm không được để trống.',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'price.required' => 'Giá sản phẩm là bắt buộc.',
            'quantity.required' => 'Số lượng sản phẩm là bắt buộc.',
            'quantity.min' => 'Số lượng sản phẩm không thể nhỏ hơn :min.',
            'quantity_warning.integer' => 'Số lượng cảnh báo phải là số nguyên.',
            'quantity_warning.min' => 'Số lượng cảnh báo không thể nhỏ hơn 0.',
            'tags.max' => 'Tags không được vượt quá 255 ký tự.',
            'category_id.required' => 'Danh mục sản phẩm là bắt buộc.',
            'brand_id.required' => 'Thương hiệu sản phẩm là bắt buộc.',
            'image.image' => 'Ảnh sản phẩm phải là một tệp hình ảnh.',
            'image.required' => 'Bắt buộc chọn 1 ảnh',
        ]);
        $product = $this->createBasicProductInfor($request);

        if (!$product) {
            return redirect()->back()->with('error', 'Không thể tạo sản phẩm');
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $obj = new ProductAttackment();
                $obj->product_id = $product->id;
                $obj->image_url = $this->uploadImage($image, 'storage/attackment/');
                $obj->save();
            }
        }

        if (is_array($request->variants)) {
            $this->createVariantProduct($request, $product->id);
        }

        return redirect()->route('admin.product.index')->with('messages', 'Thêm sản phẩm thành công');
    }


    private function createBasicProductInfor($request)
    {
        $obj = new Product();
        $obj->name = $request->name;
        $obj->price = $request->price;
        $obj->description = $request->description;
        $obj->quantity = $request->quantity;
        $obj->weight = $request->weight ? $request->weight : 0;
        $obj->quantity_warning = $request->quantity_warning ? $request->quantity_warning : null;
        $obj->tags = $request->tags ? $request->tags : null;
        $obj->sku  = $request->sku;
        $obj->brand_id = $request->brand_id;
        $obj->category_id = $request->category_id;
        $obj->active = 1;
        $obj->image = $this->uploadImage($request->file('image'), 'storage/product/');
        $obj->instructional_images = $this->uploadImage($request->file('instructional_images'), 'storage/product/');

        if ($obj->save()) {
            return $obj;
        }

        return null;
    }

    private function uploadImage($file, $path)
    {
        if (!$file || !$file->isValid()) {
            return null;
        }

        $fileName = time() . '_' . $file->getClientOriginalName();

        $filePath = public_path($path);

        if (!file_exists($filePath)) {
            mkdir($filePath, 0777, true);
        }

        $file->move($filePath, $fileName);

        return asset("$path/$fileName");
    }
    private function createVariantProduct($request, $product_id)
    {
        foreach ($request->variants as $key => $variant) {
            if (is_object($variant)) {
                $variant = (array) $variant;
            }

            if (!is_array($variant)) {
                continue;
            }

            $obj = new Variant();
            $obj->product_id = $product_id;
            $obj->sku = $variant['sku'] ?? null;
            $obj->price = $variant['price'] ?? 0;
            $obj->quantity = $variant['quantity'] ?? 0;
            $obj->weight = $variant['weight'] ?? null;
            $obj->image = isset($variant['image']) ? $this->uploadImage($variant['image'], 'storage/variant/') : null;
            $obj->description = $variant['description'] ?? null;
            $obj->save();

            if (!empty($variant['attribute_values'])) {
                foreach ($variant['attribute_values'] as $key => $value) {
                    $attribute_value = AttributeValue::find($value);

                    if (!$attribute_value) {
                        continue;
                    }

                    $variant_value = new VariantAttributeValue();
                    $variant_value->variant_id = $obj->id;
                    $variant_value->attribute_id = $attribute_value->attribute_id;
                    $variant_value->attribute_value_id = $attribute_value->id;
                    $variant_value->save();
                }
            }
        }
    }
    public function updateStatus()
    {
        $product = Product::find($_GET['id']);
        if ($product) {
            $product->active = $_GET['status'] ;
            $product->save();
            return response()->json(['status' => 'success', 'message' => 'Cập nhật trạng thái thành công']);
        }
        return response()->json(['status' => 'error', 'message' => 'Không tìm thấy sản phẩm']);
    }
}
