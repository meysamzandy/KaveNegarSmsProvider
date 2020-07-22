<?php

namespace MeysamZnd\KaveNegarSmsProvider;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const CONFIG_PATH = __DIR__.'/../config/kave-negar-sms-provider.php';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('kave-negar-sms-provider.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'kave-negar-sms-provider'
        );

        $this->app->bind('kave-negar-sms-provider', function () {
            return new KaveNegarSmsProvider(new ToOne());
        });
    }
}
