<?php namespace Swapshop\Controllers;

use \View;
use \Redirect;
use \Input;

use Swapshop\Repositories\PurchaseRepositoryInterface;
use Swapshop\Services\Validators\PurchaseValidator;

class PurchaseController extends \BaseController {
	
	public $restful = true;
	
	protected $purchaseRepository;

	public function __construct(PurchaseRepositoryInterface $purchaseRepository)
	{
		$this->purchaseRepository = $purchaseRepository;
	}
}