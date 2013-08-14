<?php

use Swapshop\Repositories\PurchaseRepositoryInterface;
use Swapshop\Services\Validators\PurchaseValidator;

class PurchaseController extends BaseController {
	
	public $restful = true;
	
	protected $purchaseRepository;

	public function __construct(PurchaseRepositoryInterface $purchaseRepository)
	{
		$this->purchaseRepository = $purchaseRepository;
	}
}