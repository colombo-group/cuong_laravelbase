<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        if(!Auth::user()->role == 1) {
            return redirect()->back()->with(['flash_level' => 'danger', 'flash_message' => 'You are not permission']);
        }
        return $next($request);
    }
}
