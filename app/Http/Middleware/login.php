<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class login
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
        $path=$request->path();
        if(($path=="login" || $path=="register") && $id!=null)
        {
            return redirect()->route("home");
           
        }
      
        return $next($request);
            
        
        
    }
}
