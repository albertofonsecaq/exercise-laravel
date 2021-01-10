<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        $userRole = $request->user()->rol()->first();

        if ($userRole) {

            $request->request->add([
                'scope' => $userRole->name
            ]);

        }
        return $next($request);
    }
}
