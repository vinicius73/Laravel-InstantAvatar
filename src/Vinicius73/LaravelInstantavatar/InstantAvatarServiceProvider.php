<?php namespace Vinicius73\LaravelInstantAvatar;

use Illuminate\Support\ServiceProvider;

class InstantAvatarServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('vinicius73/laravel-instantavatar', 'InstantAvatar');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            'vinicius73.instantavatar',
            function ($app) {
                $config = $app['config']->get('InstantAvatar::config', array());

                return new LaravelInstantAvatar($config);
            }
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

}
