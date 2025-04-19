<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        // Kiểm tra nếu người dùng chưa đăng nhập
        if (!Auth::check()) {
            return redirect()->route('login'); // Chuyển hướng về trang login
        }

        // Kiểm tra nếu người dùng không phải Admin hoặc không có quyền truy cập
        if (!Auth::user() && !Auth::user()->hasPermission($permission)) {
            abort(403, 'Bạn không có quyền truy cập!');
        }

        return $next($request);
    }
}
