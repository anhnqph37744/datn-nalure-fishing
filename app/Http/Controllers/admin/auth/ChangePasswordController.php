<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'changePassword' => 'required|min:6',
                'confirmPassword' => 'required|same:changePassword'
            ], [
                'changePassword.required' => 'Vui lòng nhập mật khẩu mới',
                'changePassword.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
                'confirmPassword.required' => 'Vui lòng xác nhận mật khẩu',
                'confirmPassword.same' => 'Mật khẩu xác nhận không khớp'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            $user = Auth::user();
            $user->password = Hash::make($request->changePassword);
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'Đổi mật khẩu thành công'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi xảy ra khi đổi mật khẩu'
            ], 500);
        }
    }
}
