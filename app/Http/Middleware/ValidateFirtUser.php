<?php

namespace App\Http\Middleware;

use Closure;
use App\Users;
use Illuminate\Support\Facades\Auth;

class ValidateFirtUser
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
        $user = Users::count();
        if ($user > 0 && !Auth::check()) {
            return redirect('/');
        }
        return $next($request);
    }
}
