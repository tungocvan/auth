<?php

namespace modules\Posts\src\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;

class Posts
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
        //echo 'middleware Posts' ;
        return $next($request);
    }
}
