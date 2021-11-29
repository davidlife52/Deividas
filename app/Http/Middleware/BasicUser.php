<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BasicUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check()){
        if(auth()->user()->role != 0){
            abort(Response::HTTP_UNAUTHORIZED);
        }
        }else{
            abort(Response::HTTP_UNAUTHORIZED);
        }
        return $next($request);
    }
}
