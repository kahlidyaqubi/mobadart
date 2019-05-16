<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class CheckPermissionTow
{
    public function handle($request, Closure $next)
    {
        $type=\Auth::user()->the_type;

        if($type == 1){
            return redirect('/admin');
        }



        return $next($request);
    }
}
