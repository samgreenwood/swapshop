<?php namespace Swapshop\Providers;

use Illuminate\Support\ServiceProvider;

class FilterServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['router']->filter('auth', function () {
            if ($this->app['auth']->guest())  $this->app['redirect']->guest('login');
        });

        $this->app['router']->filter('admin', function () {
            $user = $this->app['auth']->user();

            if ( $user && ! $user->isAdmin()) return  $this->app['redirect']->to('/');
        });

        $this->app['router']->filter('auth.basic', function () {
            return $this->app['auth']->basic();
        });

        $this->app['router']->filter('guest', function () {
            if ($this->app['auth']->check()) return $this->app['redirect']->to('/');
        });
    }
}