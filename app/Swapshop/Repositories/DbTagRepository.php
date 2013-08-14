<?php namespace Swapshop\Repositories;

use Swapshop\Tag;

class DbTagRepository extends DbBaseRepository implements TagRepositoryInterface
{
	public function __construct(Tag $model)
	{
		parent::__construct($model);
	}

}