<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        Log::info('Role ID: ' . auth()->user()->id_role); // Tambahkan ini
        Log::info('Required Roles: ' . implode(', ', $roles)); // Tambahkan ini
        if (Auth::check() && in_array(auth()->user()->id_role, $roles)) {
            return $next($request);
        }

        return redirect('/redirect');
    }
    
}
