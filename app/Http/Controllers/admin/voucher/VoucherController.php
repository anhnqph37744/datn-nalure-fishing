<?php

namespace App\Http\Controllers\admin\voucher;

use Carbon\Carbon;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VoucherRequest;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Voucher::query();

        // Tìm kiếm theo mã voucher
        if ($request->has('code')) {
            $query->where('code', 'like', '%' . $request->code . '%');
        }

        // Tìm kiếm theo tiêu đề
        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        // Lọc theo loại voucher
        if ($request->has('voucher_type') && $request->voucher_type != '') {
            $query->where('voucher_type', $request->voucher_type);
        }

        // Lọc theo trạng thái
        if ($request->has('is_active') && $request->is_active != '') {
            $query->where('is_active', $request->is_active);
        }

        // Lọc theo thời gian
        if ($request->has('start_date') && $request->start_date) {
            $query->where('start_date', '>=', Carbon::parse($request->start_date)->startOfDay());
        }
        if ($request->has('end_date') && $request->end_date) {
            $query->where('end_date', '<=', Carbon::parse($request->end_date)->endOfDay());
        }

        $voucher = $query->get();
        return view('admin.pages.voucher.list', compact('voucher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.voucher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VoucherRequest $request)
    {
        $voucher = Voucher::create([
            'code' => $request->code,
            'title' => $request->title,
            'voucher_type' => $request->voucher_type,
            'value' => $request->value,
            'discount_type' => $request->discount_type,
            'min_order_value' => $request->min_order_value,
            'max_discount_value' => $request->max_discount_value,
            'start_date' => Carbon::parse($request['start_date']),
            'end_date' => Carbon::parse($request['end_date']),
            'limit' => $request->limit,
            'is_active' => $request->is_active,
        ]);
        // dd($voucher);

        return redirect()->route('admin.voucher.index')->with('success', 'Voucher được thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $voucher = Voucher::find($id);
        return view('admin.pages.voucher.update', compact('voucher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VoucherRequest $request, string $id)
    {
        $voucher = Voucher::findOrFail($id);
        $obj = Voucher::find($id);
        $obj->update([
            'code' => $request->code,
            'title' => $request->title,
            'voucher_type' => $request->voucher_type,
            'value' => $request->value,
            'discount_type' => $request->discount_type,
            'min_order_value' => $request->min_order_value,
            'max_discount_value' => $request->max_discount_value,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'limit' => $request->limit,
            'is_active' => $request->is_active,

        ]);


        return redirect()->route('admin.voucher.index')->with('success', 'Sửa thành công voucher');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $voucher = Voucher::findOrFail($id);
        $voucher->delete();
        return redirect()->route('admin.voucher.index')->with('success', 'Voucher đã bị xóa!');
    }
}
