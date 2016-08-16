<?php

namespace App\Http\Middleware;

use Closure;

class Reseller
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
      if ((Auth::check()) && (Auth::user()->isReseller()))
      {
        return $next($request);
      }
      return redirect('/');
    }
}
