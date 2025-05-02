<?php

namespace App\Http\Controllers\client\address;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'full_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'province' => 'required',
        'district' => 'required',
        'ward' => 'required',
        'address' => 'required',
    ]);

    if ($request->is_default) {
        Address::where('user_id', auth()->id())->update(['is_default' => 0]);
    }

    $data = $request->only([
        'full_name', 'email', 'phone', 'province',
        'district', 'ward', 'address', 'note', 'is_default'
    ]);
    $data['user_id'] = auth()->id();
    $data['is_default'] = $request->has('is_default') ? 1 : 0;

    if ($request->id) {
        Address::where('id', $request->id)->where('user_id', auth()->id())->update($data);
    } else {
        Address::create($data);
    }

    return redirect()->back()->with('success', 'Địa chỉ đã được lưu');
}

public function destroy($id)
{
    Address::where('id', $id)->where('user_id', auth()->id())->delete();
    return redirect()->back()->with('success', 'Đã xóa địa chỉ');
}

}
