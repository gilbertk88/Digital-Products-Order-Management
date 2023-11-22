<?php

namespace EwmDpmNamespace\Providers;

use Themosis\Core\Support\Providers\RouteServiceProvider as ServiceProvider;
use Themosis\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Controller namespace for plugin routes.
     *
     * @var string
     */
    protected $namespace = 'EwmDpmNamespace\Controllers';

    public function boot()
    {
        parent::boot();
    }

    /**
     * Load plugin routes.
     */
    public function map()
    {
        $pluginName = ltrim(
            str_replace(dummy_path(), '', realpath(__DIR__.'/../../')),
            '\/'
        );

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(dummy_path($pluginName.'/routes.php'));
    }
}

