<?php

namespace App\Http\Middleware;

use Closure;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $is_login = session('is_login',false);
        if(!$is_login){
            return redirect('/admin/login?errmsg=' . urlencode('用户未登录'));
        }
        return $next($request);
    }
}
