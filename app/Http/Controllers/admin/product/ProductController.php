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
        $products = Product::with('category','images','brand','variant.varianAttributeValue.attribute','variant.varianAttributeValue.attributeValue')->orderBy('id','DESC')->get();
        // dd($products);
        return view($this->base_url . __FUNCTION__,compact('products'));
        // return response()->json($products);
    }
    public function edit($id)
    {
        return view($this->base_url . __FUNCTION__);
    }
    public function destroy($id)
    {
        return true;
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
        $obj->weight = $request->weight ? $request->weight : null;
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
}
