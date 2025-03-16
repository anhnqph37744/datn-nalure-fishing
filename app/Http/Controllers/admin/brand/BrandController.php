<?php

namespace App\Http\Controllers\admin\brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.pages.brand.list', compact('brands'));
    }

    public function create()
    {
        return view('admin.pages.brand.create');
    }

    public function store(BrandRequest $request)
    {

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'storage/brand/' . $imageName;
            $image->move(public_path('storage/brand'), $imageName);
        }

        Brand::create([
            'name' => $request->name,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.brand.index')->with('success', 'Thương hiệu được thêm thành công!');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        if ($brand->image && file_exists(public_path($brand->image))) {
            unlink(public_path($brand->image));
        }

        $brand->delete();
        return redirect()->route('admin.brand.index')->with('success', 'Thương hiệu đã bị xóa!');
    }
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.pages.brand.update', compact('brand'));
    }
    public function update(BrandRequest $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $obj = Brand::find($id);

        $imagePath = null;
        if ($request->hasFile('image')) {

            if ($obj->image && file_exists(public_path($obj->image))) {
                unlink(public_path($obj->image));
            }
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'storage/brand/' . $imageName;
            $image->move(public_path('storage/brand'), $imageName);
        } else {
            $imagePath = $obj->image;
        }

        $obj->update([
            'name' => $request->name,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.brand.index')->with('success', 'Thương Hiệu được thêm thành công!');
    }
}
