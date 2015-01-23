<?php namespace Swapshop\Providers;

use Illuminate\Support\ServiceProvider;

class RoutingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        include __DIR__ . '/../Http/routes.php';
    }

    public function register()
    {

    }
}