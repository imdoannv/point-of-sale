<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();

        if (!$user) {
            toastr()->error('Bạn cần đăng nhập trước khi thực hiện','Chưa đăng nhập');
            return redirect('/login'); // Hoặc thực hiện xử lý tương tự nếu không có người dùng nào đăng nhập
        }

        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        return abort(403);
    }
}
