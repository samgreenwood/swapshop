<?php namespace Swapshop\Providers;

use Illuminate\Support\ServiceProvider;
use Swapshop\Tag\EloquentTagRepository;
use Swapshop\Tag\TagRepositoryInterface;

class SwapshopServiceProvider extends ServiceProvider
{

    public function register()
    {


        $this->app->singleton(TagRepositoryInterface::class, EloquentTagRepository::class);

        $this->app['view']->composer('layouts.master', function ($view) {

            $view->with('user', \Auth::user());
            $view->with('tags', $this->app[TagRepositoryInterface::class]->getAll());
        });

    }

}