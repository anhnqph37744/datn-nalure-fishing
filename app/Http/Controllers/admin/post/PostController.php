<?php

namespace App\Http\Controllers\admin\post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Lấy danh sách tất cả bài viết.
     */
    // public function __construct()
    // {
    //     // Quyền truy cập view (index, show)
    //     $this->middleware('permission:bai-viet-index')->only(['index', 'show']);

    //     // Quyền tạo (create, store)
    //     $this->middleware('permission:bai-viet-store')->only(['create', 'store']);

    //     // Quyền chỉnh sửa (edit, update)
    //     $this->middleware('permission:bai-viet-update')->only(['edit', 'update']);

    //     // Quyền xóa (destroy)
    //     $this->middleware('permission:bai-viet-destroy')->only('destroy');

    //     $this->middleware('permission:bai-viet-capNhatTrangThai')->only('capNhatTrangThai');
    // }
    public function index(Request $request)
    {
        $query = Post::with(['author', 'postCategory']);

        if ($request->filled('post_category_id')) {
            $query->where('post_category_id', $request->post_category_id);
        }

        $posts = $query->get();
        $postCategories = PostCategory::all();

        return view('admin.post.index', compact('posts', 'postCategories'));
    }

    public function create()
    {
        $postCategories = PostCategory::all();
        return view('admin.post.add', compact('postCategories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'post_category_id' => 'required|exists:post_categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $validated['thumbnail'] = $path;
        }

        $validated['user_id'] = auth()->id();

        Post::create($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Thêm bài viết thành công!');
    }

    public function show($id)
    {
        $post = Post::with('postCategory')->findOrFail($id);
        return view('admin.post.detail', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $postCategories = PostCategory::all();
        return view('admin.post.edit', compact('post', 'postCategories'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'post_category_id' => 'required|exists:post_categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $id,
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $validated['thumbnail'] = $path;
        }

        $post->update($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Cập nhật bài viết thành công!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Xóa bài viết thành công!');
    }
}
