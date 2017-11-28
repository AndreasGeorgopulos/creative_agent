<?php

// Admin oldalakhoz middleware
// csak bejelentkezett administrator csoportban levő felhasználók férhetnek hozzá

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle ($request, Closure $next) {
        if (!Auth::user()) {
            if ($request->ajax() || $request->wantsJson()) {
                // ajax hívás
                return response('Unauthorized.', 401);
            } else {
                // vissza a főoldalra
                return redirect()->guest('/admin/login');
            }
        }
        return $next($request);
    }
}
