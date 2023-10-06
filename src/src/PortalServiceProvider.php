<?php

namespace Vendor\Portal;

use Illuminate\Support\ServiceProvider;

class PortalServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__ . '/config/totp.php.php' => config_path('totp.php'),
        ], 'config');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/config/totp.php';
        $this->mergeConfigFrom($configPath, 'totp');
    }
}
