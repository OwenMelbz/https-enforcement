<?php

namespace OwenMelbz\HttpsEnforcement;

use Closure;

class HttpsEnforcementAgency {

    private static $except = [];

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
            if (!$request->secure() && !$this->inExceptArray($request)) {
                return redirect()->secure($request->getRequestUri());
            }
        }

        return $next($request);
    }

    /**
     * Determine if the request has a URI that should pass through CSRF verification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function inExceptArray($request)
    {
        foreach (self::getExceptions() as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }

            if ($request->is($except)) {
                return true;
            }
        }

        return false;
    }

    public static function setExceptions($except = [])
    {
        self::$except = $except;
    }

    public static function getExceptions()
    {
        return self::$except;
    }
}
