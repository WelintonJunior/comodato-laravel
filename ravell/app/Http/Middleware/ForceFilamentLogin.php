<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ForceFilamentLogin
{
    public function handle(Request $request, Closure $next)
    {
        // intercepta o POST da tela de login
        if ($request->is('admin/login') && $request->isMethod('post')) {

            $login = $request->input('login');

            if ($login) {
                $user = User::where('usuLogin', $login)->first();

                if ($user) {
                    Auth::login($user); // << IGNORA COMPLETAMENTE A SENHA

                    return redirect()->intended('/admin');
                }
            }
        }

        return $next($request);
    }
}
