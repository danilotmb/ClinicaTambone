<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->usertype == 1) {
            return $next($request);
        }

        return redirect('/home')->with('error', 'Accesso non autorizzato');
    }
}

