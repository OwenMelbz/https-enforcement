<?php

namespace OwenMelbz\HttpsEnforcement;

use Closure;

class HttpsEnforcementAgency {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (config('https_enforcement.enforce_https') === true) {
            if (!$request->secure()) {
                return redirect()->secure($request->getRequestUri());
            }
        }

        return $next($request);
    }
}
