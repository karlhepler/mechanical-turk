<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Laravel;

use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\ServiceProvider;
use OldTimeGuitarGuy\MechanicalTurk\Requester;
use OldTimeGuitarGuy\MechanicalTurk\Http\Request;

class MechanicalTurkServiceProvider extends Provider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Copy over the config file
        $this->publishes([
            __DIR__.'/config.php' => config_path('mechanical_turk.php')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(function($app) {
            // Create the request object
            $request = new Request(
                new GuzzleClient,
                $app['config']['mechanical_turk.accessKeyId'],
                $app['config']['mechanical_turk.secretAccessKey'],
                $app['config']['mechanical_turk.useSandbox']
            );

            // Return the requester
            return new Requester($request);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            Requester::class,
        ];
    }
}
