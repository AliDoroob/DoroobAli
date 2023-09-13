<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthentication
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (!Auth::check() ) {
            return redirect('/access')->with('error', 'You can\'t access here!');
        }

        if (Auth::user()->role_id == 1) {
            return redirect('/access')->with('error', 'You can\'t access here!');
        }

        
        return $next($request);
    }
}
