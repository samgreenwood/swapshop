<?php namespace Swapshop\Providers;

use Illuminate\Support\ServiceProvider;
use Swapshop\Http\Composers\ProductFormComposer;
use Swapshop\Image\EloquentImageRepository;
use Swapshop\Image\ImageRepositoryInterface;
use Swapshop\Product\EloquentProductRepository;
use Swapshop\Product\ProductRepositoryInterface;
use Swapshop\Tag\EloquentTagRepository;
use Swapshop\Tag\TagRepositoryInterface;

class SwapshopServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(TagRepositoryInterface::class, EloquentTagRepository::class);
        $this->app->singleton(ProductRepositoryInterface::class, EloquentProductRepository::class);
        $this->app->singleton(ImageRepositoryInterface::class, EloquentImageRepository::class);

        $this->app['view']->composer('layouts.master', function ($view) {

            $view->with('user', \Auth::user());
            $view->with('tags', $this->app[TagRepositoryInterface::class]->getAll());
        });

        $this->app['view']->composer('products._form', ProductFormComposer::class);


    }

}