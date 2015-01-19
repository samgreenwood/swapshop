<?php namespace Swapshop;

use Illuminate\Support\ServiceProvider;

class SwapshopServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app['view']->composer('layouts.master', function ($view) {

            $view->with('user', \Auth::user());
            $view->with('tags', Tag::all());
        });

    }

}