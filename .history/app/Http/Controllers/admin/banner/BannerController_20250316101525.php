<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\HinhAnhBanner\ThemHinhAnhBannerRequest;
use App\Models\Banner;
use App\Models\HinhAnhBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function __construct()
    {
        // Quyền truy cập view (index, show)
        $this->middleware('permission:banner-index')->only(['index', 'show']);

        // Quyền tạo (create, store)
        $this->middleware('permission:banner-store')->only(['create', 'store']);

        // Quyền chỉnh sửa (edit, update)
        $this->middleware('permission:banner-update')->only(['edit', 'update']);

        // Quyền xóa (destroy)
        $this->middleware('permission:banner-destroy')->only('destroy');
    }
    public function index($id = null)
    {
        if ($id) {
            $banners = Banner::with('hinhAnhBanner')
                ->where('id', $id)
                ->get();
        } else {
            $banners = Banner::with('hinhAnhBanner')->get();
        }

        return view('admin.banner.index', compact('banners'));
    }


    public function create()
    {
        return view('admin.banner.add');
    }

    public function store(BannerRequest $request)
    {

        // Thêm mới banner
        $banner = Banner::create([
            'tieu_de' => $request->input('tieu_de'),
            'noi_dung' => $request->input('noi_dung'),
            'loai_banner' => $request->input('loai_banner'),
            'trang_thai' => $request->input('trang_thai'),
        ]);

        // Lấy ID banner vừa tạo
        $bannerID = $banner->id;

        // Xử lý thêm album ảnh
        if ($request->hasFile('list_image')) {
            foreach ($request->file('list_image') as $image) {
                if ($image) {
                    $path = $image->store('uploads/hinhanhbanner/id_' . $bannerID, 'public');

                    // Thêm ảnh vào bảng HinhAnhBanner
                    HinhAnhBanner::create([
                        'banner_id' => $bannerID,
                        'hinh_anh' => $path,
                    ]);
                }
            }
        }

        return redirect()->route('banner.index')->with('success', 'Thêm banner và ảnh thành công');
    }

    public function show($id)
    {
        $banner = Banner::find($id);
        return view('admin.banner.detail', compact('banner'));
    }


    public function edit(string $id)
    {
        $banner = Banner::query()->findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, string $id)
    {
        if ($request->isMethod('PUT')) {
            $params = $request->except('_token', '_method');
            $banner = Banner::query()->findOrFail($id);

            // Ablum banner
            $currentImages = $banner->hinhAnhBanner->pluck('id')->toArray();

            if (is_array($request->list_image)) {
                // Xử lý khi có danh sách hình ảnh
                $arrayCombine = array_combine($currentImages, $currentImages);
                foreach ($arrayCombine as $key => $value) {
                    if (!array_key_exists($key, $request->list_image)) {
                        $hinhAnhBanner = HinhAnhBanner::query()->find($key);
                        if ($hinhAnhBanner && Storage::disk('public')->exists($hinhAnhBanner->hinh_anh)) {
                            Storage::disk('public')->delete($hinhAnhBanner->hinh_anh);
                            $hinhAnhBanner->delete();
                        }
                    }
                }

                // Thêm hoặc cập nhật hình ảnh
                foreach ($request->list_image as $key => $image) {
                    if (!array_key_exists($key, $arrayCombine)) {
                        if ($request->hasFile("list_image.$key")) {
                            $path = $image->store('uploads/hinhanhbanner/id_' . $id, 'public');
                            $banner->hinhAnhBanner()->create([
                                'banner_id' => $id,
                                'hinh_anh' => $path,
                            ]);
                        }
                    } else if (is_file($image) && $request->hasFile("list_image.$key")) {
                        // Thay đổi hình ảnh
                        $hinhAnhBanner = HinhAnhBanner::query()->find($key);
                        if ($hinhAnhBanner && Storage::disk('public')->exists($hinhAnhBanner->hinh_anh)) {
                            Storage::disk('public')->delete($hinhAnhBanner->hinh_anh);
                        }

                        $path = $image->store('uploads/hinhanhbanner/id_' . $id, 'public');
                        $hinhAnhBanner->update([
                            'hinh_anh' => $path,
                        ]);
                    }
                }
            } else {
                // Trường hợp không có hình ảnh nào được truyền lên (xóa toàn bộ ảnh hiện có)
                foreach ($banner->hinhAnhBanner as $hinhAnhBanner) {
                    if (Storage::disk('public')->exists($hinhAnhBanner->hinh_anh)) {
                        Storage::disk('public')->delete($hinhAnhBanner->hinh_anh);
                    }
                    $hinhAnhBanner->delete();
                }
            }

            // Cập nhật các thông tin khác của banner
            $banner->update($params);
            return redirect()->route('banner.index')->with('success', 'Cập nhật Banner thành công.');
        }
    }


    public function destroy(string $id)
    {
        $banner = Banner::query()->findOrFail($id);

        // xóa album
        $banner->hinhAnhBanner()->delete();

        $path = 'uploads/hinhanhbanner/id_' . $id;
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->deleteDirectory($path);
        }
        $banner->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
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
        $contact = Banner::find($id);

        if ($contact) {
            $contact->trang_thai = $newStatus;
            $contact->save();

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật trạng thái thành công'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Không tìm thấy thể loại'
        ], 404);
    }

    public function getBannersByType($type)
    {
        // Lấy tối đa 3 banner theo loại được chọn
        $banners = Banner::where('loai_banner', $type)
            ->where('trang_thai', 'hien')
            ->take(3)
            ->get();

        return response()->json(['banners' => $banners]);
    }
}
