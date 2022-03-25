<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin2Auth
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
        if (!$request->session()->has('ADMIN_ID2')) {
            return redirect(url("/admin2/invoice/login"));
        }else{
            return $next($request);
        }
    }
}
