<?php

namespace App\Http\Controllers\admin\post;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    // Nếu bạn dùng phân quyền, bỏ comment dưới đây
    /*
    public function __construct()
    {
        $this->middleware('permission:chuyen-muc-index')->only(['index', 'show']);
        $this->middleware('permission:chuyen-muc-store')->only(['create', 'store']);
        $this->middleware('permission:chuyen-muc-update')->only(['edit', 'update']);
        $this->middleware('permission:chuyen-muc-destroy')->only('destroy');
        $this->middleware('permission:chuyen-muc-capNhatTrangThai')->only('capNhatTrangThai');
    }
    */

    /**
     * Hiển thị danh sách tất cả danh mục.
     */
    public function index()
    {
        $categories = PostCategory::all();

        return view('admin.post_categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = PostCategory::all();
        return view('admin.post_categories.add', compact('categories'));
    }

    /**
     * Tạo mới một danh mục.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:post_categories,slug',
            'description' => 'nullable|string',
        ]);

        $category = PostCategory::create($validated);

        return redirect()->route('admin.post-categories.index')
            ->with('success', 'Tạo danh mục thành công');
    }

    /**
     * Lấy thông tin một danh mục theo ID.
     */
    public function show($id)
    {
        $category = PostCategory::findOrFail($id);
        return view('admin.post_categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = PostCategory::findOrFail($id);
        return view('admin.post_categories.edit', compact('category'));
    }

    /**
     * Cập nhật thông tin danh mục.
     */
    public function update(Request $request, $id)
    {
        $category = PostCategory::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:post_categories,slug,' . $id,
            'description' => 'nullable|string',
        ]);

        $category->update($validated);

        return redirect()->route('admin.post-categories.index')
            ->with('success', 'Cập nhật danh mục thành công');
    }

    /**
     * Xoá một danh mục.
     */
    public function destroy($id)
    {
        $category = PostCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.post-categories.index')
            ->with('success', 'Xóa danh mục thành công');
    }
}
