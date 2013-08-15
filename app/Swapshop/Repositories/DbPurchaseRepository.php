<?php namespace Swapshop\Repositories;

use Swapshop\Purchase;

class DbPurchaseRepository extends DbBaseRepository implements PurchaseRepositoryInterface
{
	public function __construct(Purchase $model)
	{
		parent::__construct($model);
	}

}