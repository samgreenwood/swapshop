<?php namespace Swapshop\Repositories;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
	public function syncImages($productID, $images);

	public function syncTags($productID, $tags);

}