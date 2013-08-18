<?php namespace Swapshop;

use Illuminate\Support\ServiceProvider;
use Goonwood\ASLdapAuth\ASLdapUserProvider;

class SwapshopServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->singleton('Swapshop\Repositories\UserRepositoryInterface', 'Swapshop\Repositories\DbUserRepository');
		$this->app->singleton('Swapshop\Repositories\ImageRepositoryInterface', 'Swapshop\Repositories\DbImageRepository');
		$this->app->singleton('Swapshop\Repositories\ListingRepositoryInterface', 'Swapshop\Repositories\DbListingRepository');
		$this->app->singleton('Swapshop\Repositories\ProductRepositoryInterface', 'Swapshop\Repositories\DbProductRepository');
		$this->app->singleton('Swapshop\Repositories\PurchaseRepositoryInterface', 'Swapshop\Repositories\DbPurchaseRepository');
		$this->app->singleton('Swapshop\Repositories\TagRepositoryInterface', 'Swapshop\Repositories\DbTagRepository');
	}

}