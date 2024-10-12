<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty(Auth::check()))
        {
            if(Auth::user()->status != 0)
            {
                if(Auth::user()->role_id == 1)
                {
                    Auth::logout();
                    return redirect()->back()->with('fail','Your Account is denied!');
                }
                else
                {
                    return $next($request);
                }
            }
            else
            {
                Auth::logout();
                return back()->with('fail','Account has been blocked!');
            }
        }
        else
        {
            Auth::logout();
            return redirect()->route('home')->with('fail', 'Login Please!');
        }
    }
}