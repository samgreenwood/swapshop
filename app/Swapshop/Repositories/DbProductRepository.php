<?php namespace Swapshop\Repositories;

use Swapshop\Product;

class DbProductRepository extends DbBaseRepository implements ProductRepositoryInterface
{
	public function __construct(Product $model)
	{
		parent::__construct($model);
	}

	public function syncTags($productID, $tags)
	{
		return $this->model->find($productID)->tags()->sync($tags);
	}

	public function tagList($productID)
	{
		return $this->model->find($productID)->tags()->lists('tag_id');
	}
}