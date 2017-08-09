<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\Models\Roles;

use Closure;

class isAdminMiddleware
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
        if(!Auth::guest()){
            return redirect($next);

        $arr = [];
        $admin_ids = Roles::select('id')->where('name', "!=", 'User')->get()->each(function($k) use(&$arr) {
            $arr[] =$k->id;
        });
    }

       if (Auth::user() && in_array(Auth::user()->role_id, $arr)) {
            return $next($request);
        }
        return redirect()->route('adminLogin');
    }

}
