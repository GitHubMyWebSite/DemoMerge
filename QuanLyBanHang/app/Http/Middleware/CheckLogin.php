<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckLogin
{
    public function handle($request, Closure $next)
    {
        if(session()->has('dangnhapthanhcong') && session()->get('dangnhapthanhcong') == true){
            return $next($request);
         }else{
             return redirect('dangnhap');
         }
       
    }
}