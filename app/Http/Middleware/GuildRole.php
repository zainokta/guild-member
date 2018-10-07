<?php

namespace App\Http\Middleware;

use Closure;

class GuildRole
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
        if($request->user()->role != "Guild Master"){
            return redirect('/');
        }
        return $next($request);
    }
}
