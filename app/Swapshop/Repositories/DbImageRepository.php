<?php namespace Swapshop\Repositories;

use Swapshop\Image;

class DbImageRepository extends DbBaseRepository implements ImageRepositoryInterface
{
	public function __construct(Image $model)
	{
		parent::__construct($model);
	}

}