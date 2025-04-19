<?php

namespace App\Http\Controllers\client\profile;

use App\Models\Cart;
use App\Models\User;
use App\Models\Profile;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UpdateProfileController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::get();
        $user = Auth::user();
        $cart  = Cart::where('id_user', Auth::id())->get();
        $profile = Profile::where('user_id', $user->id)->first();
        return view('client.pages.profile', compact('user', 'profile', 'cart', 'vouchers'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'gender' => 'required|in:Nam,Nữ',
            'birthday' => 'required|date',
            'address' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        

        try {
            $user = Auth::user();
            
            // Update user basic info
            $user->name = $request->username;
            $user->email = $request->email;
            $user->save();
    
            // Handle profile update or creation
            $profile = Profile::firstOrNew(['user_id' => $user->id]);
            
            
            $profile->full_name = $request->username;
            $profile->gender = $request->gender;
            $profile->birthdate = $request->birthday;
            $profile->email = $request->email;
            $profile->phone = $request->phone;
            $profile->address = $request->address;
    
            // Handle avatar upload
            if ($request->hasFile('avatar')) {
                // Delete old image if exists
                if ($profile->image) {
                    Storage::delete('public/avatars/' . $profile->image);
                }
    
                $avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                $avatar->storeAs('public/storage/avatars', $filename);
                $profile->image = $filename;
            }
    
            $profile->save();
            
    
            return redirect()->route('profile.index')
                ->with('success', 'Cập nhật thông tin thành công!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error updating profile: ' . $e->getMessage())
                ->withInput();
        }
    }
}
