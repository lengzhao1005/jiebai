<?php

namespace App\Http\Middleware;

use Closure;

class WxOrAli
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
        session(['want_redirect_url'=>$request->getPathInfo()]);
        if(empty(session('web_user'))){
            return redirect()->route('WAauth');
        }
        return $next($request);
    }
}
