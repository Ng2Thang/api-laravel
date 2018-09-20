<?php

namespace App\Http\Middleware;

use Closure;
use App\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileCheck
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
        if(Profile::where('user_id',Auth::user()->id)->count()==1){
            return redirect()->route('profile.index');
        }
        return $next($request);
    }
}
