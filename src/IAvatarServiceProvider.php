<?php namespace Vinicius73\IAvatar;

use Illuminate\Support\ServiceProvider;

class IAvatarServiceProvider extends ServiceProvider
{

    protected $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../resources/config/iavatar.php' => config_path('iavatar.php'),
            __DIR__ . '/../resources/assets'             => base_path('resources/assets/iavatar'),
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/../resources/config/iavatar.php', 'iavatar'
        );
    }

    public function register()
    {
        $this->app->singleton(
            'iavatar',
            function ($app) {
                $config = $app['config']->get('iavatar', []);

                return new InstantAvatar($config);
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
        return ['iavatar'];
    }

}
