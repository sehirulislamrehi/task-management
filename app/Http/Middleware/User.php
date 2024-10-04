<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * @method static find(mixed $input)
 * @method static where(string $string, mixed $input)
 */
class User
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth('web')->check()) {
            return $next($request);
        } else {
            return redirect()->route('login.show');
        }
    }
}
