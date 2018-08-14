<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Role
{

    public function handle($request, Closure $next, ... $roles)
    {
        if (!Auth::check()) // Extra check
            return redirect('login');

        $user = Auth::user();

        if (Auth::user()->isAdmin()) // Admin has access to everything
            return $next($request);

        foreach ($roles as $role) { // Check a given role
            // Check if user has the role This check will depend on how your roles are set up
            if (Auth::user()->hasRole(strtolower($role)))
                return $next($request);
        }

        return redirect('login');
    }
}