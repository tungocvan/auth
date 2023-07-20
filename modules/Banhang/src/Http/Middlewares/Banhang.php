<?php

namespace modules\Banhang\src\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;

class Banhang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        echo 'middleware Banhang' ;
        return $next($request);
    }
}
