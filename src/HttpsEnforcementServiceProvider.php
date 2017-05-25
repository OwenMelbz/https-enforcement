<?php

namespace OwenMelbz\HttpsEnforcement;

use Illuminate\Support\ServiceProvider;

/**
 * Service provider for HttpsEnforcement
 *
 * @author: Owen Melbourne
 */
class HttpsEnforcementServiceProvider extends ServiceProvider {

    /**
     * This will be used to register config & view in
     * your package namespace.
     *
     * --> Replace with your package name <--
     */
    protected $packageName = 'https_enforcement';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish the config
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path($this->packageName.'.php'),
        ], 'config');

        if (config('https_enforcement.enforce_https') === true) {

            HttpsEnforcementAgency::setExceptions(
                config('https_enforcement.except')
            );

            $this->app->make('Illuminate\Contracts\Http\Kernel')->prependMiddleware(
                HttpsEnforcementAgency::class
            );
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom( __DIR__.'/../config/config.php', $this->packageName);
    }

}
