<?php

namespace Grooveland\Helpers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * register the service provider
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/groovie_helpers.php',
            'groovie_helpers'
        );

        Core::load();
    }
    /**
     * boot the service provider
     *
     * @return void
     */
    public function boot()
    {
    }
}
