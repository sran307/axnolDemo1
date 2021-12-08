<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginSection
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
        $id=session()->get("login_id");
        if($id!=null)
        {
            return $next($request);
        }
        else
        {
            return redirect()->route("login");
        }
        
    }
}
