<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ConvertPlainPassword
{
    public function handle(Request $request, Closure $next)
    {
        // Middleware removed: mutating the incoming password breaks
        // Laravel's hasher (it expects the plain password as the first
        // argument to check). Previously this middleware hashed the
        // request password on login, which caused BcryptHasher to be
        // called with an unexpected value and throw an exception.

        // Keep as a no-op to avoid interfering with authentication.
        return $next($request);
    }
}
