<?php namespace Swapshop\Repositories;

use Swapshop\Listing;

class DbListingRepository extends DbBaseRepository implements ListingRepositoryInterface
{
	public function __construct(Listing $model)
	{
		parent::__construct($model);
	}

}