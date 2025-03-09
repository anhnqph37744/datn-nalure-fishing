<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.pages.category.list', compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.category.create');
    }

    public function store(Request $request)
    {

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'storage/category/' . $imageName;
            $image->move(public_path('storage/category'), $imageName);
        }

        Category::create([
            'name' => $request->name,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Danh mục được thêm thành công!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->image && file_exists(public_path($category->image))) {
            unlink(public_path($category->image));
        }

        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Danh mục đã bị xóa!');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.pages.category.update', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $obj = Category::find($id);

        $imagePath = null;
        if ($request->hasFile('image')) {

            if ($obj->image && file_exists(public_path($obj->image))) {
                unlink(public_path($obj->image));
            }
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'storage/category/' . $imageName;
            $image->move(public_path('storage/category'), $imageName);
        } else {
            $imagePath = $obj->image;
        }

        $obj->update([
            'name' => $request->name,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Danh mục được thêm thành công!');
    }
}
