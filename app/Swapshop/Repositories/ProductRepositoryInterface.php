<?php namespace Swapshop\Repositories;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
	public function syncTags($productID, $tags);
}