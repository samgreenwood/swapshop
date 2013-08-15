<?php 

use Swapshop\Repositories\ListingRepositoryInterface;
use Swapshop\Repositories\ProductRepositoryInterface;
use Swapshop\Repositories\PurchaseRepositoryInterface;
use Swapshop\Services\Validators\ListingValidator;

class ListingController extends BaseController
{
	protected $listingRepository;
	protected $productRepository;
	protected $purchaseRepository;
	protected $listingValidator;

	public function __construct(ListingRepositoryInterface $listingRepository, ProductRepositoryInterface $productRepository, PurchaseRepositoryInterface $purchaseRepository, ListingValidator $listingValidator)
	{
		$this->listingRepository = $listingRepository;
		$this->productRepository = $productRepository;
		$this->listingValidator = $listingValidator;
		$this->purchaseRepository = $purchaseRepository;
	}

	// CRUD Functions

	public function getShow($listingID)
	{
		$listing = $this->listingRepository->findWith($listingID,array('user'));

		return View::make('listings.show', compact('listing'));
	}

	public function getCreate()
	{
		$products = $this->productRepository->all();

		return View::make('listings.create', compact('products'));
	}

	public function postCreate()
	{
		$input = Input::only('product_id', 'quantity', 'price', 'condition', 'notes');
		
		$input['user_id'] = Auth::user();
		$input['active'] = true;
		
		$v = new $this->listingValidator($input);

		if($v->passes())
		{
			// create listing in data store
			$listing = $this->listingRepository->create($input);
	
			return Redirect::action('ListingController@getShow', $listing['id'])
				->with('message','Listing created');
		}

		return Redirect::action('ListingController@getCreate')
			->withErrors($v->errors)
			->with('error','Error creating Listing');

	}
	public function getEdit($listingID)
	{
		
	}

	public function postEdit($listingID)
	{

	}

	public function getDelete($listingID)
	{
		
	}

	public function deleteDelete($listingID)
	{
		
	}

	// Purchase Listing

	public function getPurchase($listingID)
	{
		$listing = $this->listingRepository->findWith($listingID, array('product','seller'));

		return View::make('listings.purchase', compact('listing'));

	}

	public function postPurchase($listingID)
	{
		$purchaseQuantity = Input::get('quantity');
		$purchaseTotal = Input::get('total');
		
		$listing = $this->listingRepository->find($listingID);

		// remove purchased quantity from listing
		$quantity = $listing['quantity'] - $purchaseQuantity;
		$this->listingRepository->update($listingID, compact('quantity'));

		$purchase['listing_id'] = $listingID;
		$purchase['total'] = $purchaseTotal;
		$purchase['quantity'] = $purchaseQuantity;
		$purchase['user_id'] = Auth::user();

		$purchase = $this->purchaseRepository->create($purchase);
		dd($purchase);

		return Redirect::action('purchase.success', compact('purchase'));

	}

}