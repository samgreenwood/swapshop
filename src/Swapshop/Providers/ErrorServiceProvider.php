<?php namespace Swapshop\Providers;

use Illuminate\Support\ServiceProvider;
use Laracasts\Validation\FormValidationException;

class ErrorServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->error(function (FormValidationException $e) {
            return $this->app['redirect']->back()->withInput()->withErrors($e->getErrors());
        });

    }
}