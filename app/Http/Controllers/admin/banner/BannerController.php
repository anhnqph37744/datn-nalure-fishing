<?php

namespace App\Http\Controllers\admin\banner;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function __construct()
    {
        // Quyền truy cập view (index, show)
        // $this->middleware('permission:banner-index')->only(['index', 'show']);

        // Quyền tạo (create, store)
        // $this->middleware('permission:banner-store')->only(['create', 'store']);

        // Quyền chỉnh sửa (edit, update)
        // $this->middleware('permission:banner-update')->only(['edit', 'update']);

        // Quyền xóa (destroy)
        // $this->middleware('permission:banner-destroy')->only('destroy');
    }

    public function index($id = null)
    {
        $banners = $id ? Banner::where('id', $id)->get() : Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.add');
    }

    public function store(BannerRequest $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|max:255',
            'link' => 'nullable|url',
            'active' => 'required|integer|in:0,1', 
        ]);

        $imagePath = $request->file('image')->store('uploads/banners', 'public');

        Banner::create([
            'title' => $request->title,
            'image' => $imagePath,
            'content' => $request->content,
            'link' => $request->link,
            'active' => (int) $request->active,  
        ]);

        return redirect()->route('banner.index')->with('success', 'Thêm banner thành công!');
    }

    public function show($id)
    {
        $banner = Banner::find($id);
        return view('admin.banner.detail', compact('banner'));
    }

    public function edit(string $id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, string $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'active' => 'required|integer|in:0,1',  
        ]);

        if ($request->hasFile('image')) {
            if ($banner->image && Storage::exists('public/' . $banner->image)) {
                Storage::delete('public/' . $banner->image);
            }
            $banner->image = $request->file('image')->store('banners', 'public');
        }

        $banner->title = $request->title;
        $banner->content = $request->content;
        $banner->link = $request->link;
        $banner->active = (int) $request->active;  
        $banner->save();

        return redirect()->route('banner.index')->with('success', 'Cập nhật banner thành công!');
    }

    public function destroy(string $id)
    {
        $banner = Banner::findOrFail($id);

        if ($banner->image && Storage::disk('public')->exists($banner->image)) {
            Storage::disk('public')->delete($banner->image);
        }

        Storage::disk('public')->deleteDirectory('uploads/hinhanhbanner/id_' . $id);  

        $banner->delete();

        return redirect()->back()->with('success', 'Xóa banner thành công');
    }

    public function updateStatus(Request $request, $id)
    {
        $newStatus = $request->input('status');
        $validStatuses = ['an', 'hien'];

        if (!in_array($newStatus, $validStatuses)) {
            return response()->json([
                'success' => false,
                'message' => 'Trạng thái không hợp lệ'
            ], 400);
        }

        $banner = Banner::find($id);
        if ($banner) {
            $banner->active = $newStatus === 'hien' ? 0 : 1; 
            $banner->save();

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật trạng thái thành công'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Không tìm thấy banner'
        ], 404);
    }

    public function getBannersByType($type)
    {
        $banners = Banner::where('loai_banner', $type)
            ->where('active', 0)  
            ->take(3)
            ->get();

        return response()->json(['banners' => $banners]);
    }
}
