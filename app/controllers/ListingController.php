<?php 

use Swapshop\Repositories\ListingRepositoryInterface;
use Swapshop\Repositories\ProductRepositoryInterface;
use Swapshop\Services\Validators\ListingValidator;

class ListingController extends BaseController
{
	protected $listingRepository;
	protected $productRepository;
	protected $listingValidator;

	public function __construct(ListingRepositoryInterface $listingRepository, ProductRepositoryInterface $productRepository, ListingValidator $listingValidator)
	{
		$this->listingRepository = $listingRepository;
		$this->productRepository = $productRepository;
		$this->listingValidator = $listingValidator;
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

}