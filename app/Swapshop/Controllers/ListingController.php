<?php namespace Swapshop\Controllers;

use Swapshop\Repositories\ListingRepositoryInterface;
use Swapshop\Repositories\ProductRepositoryInterface;
use Swapshop\Repositories\PurchaseRepositoryInterface;
use Swapshop\Services\Validators\ListingValidator;

class ListingController extends \BaseController
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

		return \View::make('listings.show', compact('listing'));
	}

	public function getCreate()
	{
		$products = $this->productRepository->all();

		return \View::make('listings.create', compact('products'));
	}

	public function postCreate()
	{
		$input = \Input::only('product_id', 'quantity', 'price', 'condition', 'notes');
		
		$input['user_id'] = \Auth::user();
		$input['active'] = true;
		
		$v = new $this->listingValidator($input);

		if($v->passes())
		{
			// create listing in data store
			$listing = $this->listingRepository->create($input);
	
			return \Redirect::action('Swapshop\Controllers\ProductController@getListings', $input['product_id'])
				->with('message','Listing created');
		}	

		return \Redirect::action('Swapshop\Controllers\ListingController@getCreate')
			->withErrors($v->errors)
			->with('error','Error creating Listing');

	}
	public function getEdit($listingID)
	{
		$listing = $this->listingRepository->find($listingID);
		$products = $this->productRepository->all();

		return \View::make('listings.edit', compact('listing', 'products'));
	}

	public function postEdit($listingID)
	{
		$input = \Input::only('product_id', 'quantity', 'price', 'condition', 'notes');

		$v = new $this->listingValidator($input);

		if($v->passes())
		{
			// create listing in data store
			$listing = $this->listingRepository->update($listingID, $input);
	
			return \Redirect::action('Swapshop\Controllers\ProductController@getListings', $input['product_id'])
				->with('message','Listing created');
		}	

		return \Redirect::action('Swapshop\Controllers\ListingController@getCreate')
			->withErrors($v->errors);
	}

	public function getDelete($listingID)
	{
		
	}

	public function deleteDelete($listingID)
	{
		
	}

	public function getMarkSold($listingID)
	{
		$this->listingRepository->update($listingID, array('active' => false, 'quantity' => 0));

		return \Redirect::back();
	}

	// Purchase Listing

	public function getPurchase($listingID)
	{
		$listing = $this->listingRepository->findWith($listingID, array('product','seller'));

		return \View::make('listings.purchase', compact('listing'));

	}

	public function postPurchase($listingID)
	{
		$purchaseQuantity = \Input::get('quantity');
		$purchaseTotal = \Input::get('total');
		$message = \Input::get('message');

		$listing = $this->listingRepository->find($listingID);

		// remove purchased quantity from listing
		$quantity = $listing['quantity'] - $purchaseQuantity;
		$this->listingRepository->update($listingID, compact('quantity'));

		// prepare purchase data
		$purchase['listing_id'] = $listingID;
		$purchase['total'] = $purchaseTotal;
		$purchase['quantity'] = $purchaseQuantity;
		$purchase['user_id'] = \Auth::user();
		$purchase['message'] = $message;

		// create purchase in database
		$purchase = $this->purchaseRepository->create($purchase);
		
		// retrieve purchase with buyer and seller from the database
		$purchase = $this->purchaseRepository->findWith($purchase['id'], array('user', 'listing.user','listing.product'));
		
		$sellerEmail = $purchase['listing']['user']['email'];
		$buyerEmail = $purchase['user']['email'];

		
		// send email
		\Mail::queue('emails.purchase', compact('purchase'), function($message) use ($sellerEmail, $buyerEmail) {
			$message->from($buyerEmail);
			$message->to($sellerEmail)->subject('Swapshop Sale');
		});

		return \View::make('purchases.success', compact('purchase'));

	}

}