<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAnAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // check user role 
        if (Auth::user()->isAdmin()){
            return $next($request);
        }

        return redirect()->route('home')->with([
            "message"=> "You are unauthroized to view this page",
            "status" => "danger"
        ]);

    }
}
