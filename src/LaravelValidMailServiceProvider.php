<?php
/**
 * Created by IntelliJ IDEA.
 * User: ayim
 * Date: 9/14/18
 * Time: 10:43 AM
 */

namespace Ayim\LaravelValidMail;

use Illuminate\Support\ServiceProvider;

class LaravelValidMailServiceProvider extends ServiceProvider
{
    protected $defer = false;

    /**
     *
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'laramail.php' => config_path('laramail.php'),
        ]);
    }

    public function register()
    {
        $local_config = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'trumail.php';

        //Set config file
        if ($this->app['config']->get('laramail') === null) {
            $this->app['config']->set('laramail', require $local_config);
        }

        //Set service
        $this->app->singleton('LaravelValidMailService', function ($app) {
            return new LaravelValidMailService();
        });

    }
}