<?php

namespace App\Http\Middleware;

use Closure;

class Respond
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
        return "desde middleware";
        //return $next($request);
    }
}
