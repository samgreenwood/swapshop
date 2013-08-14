<?php

use Swapshop\Repositories\ProductRepositoryInterface;
use Swapshop\Repositories\TagRepositoryInterface;
use Swapshop\Repositories\ImageRepositoryInterface;
	
use Swapshop\Services\Validators\ProductValidator;

class ProductController extends BaseController {

	public $restful = true;

	protected $productRepository;
	protected $tagRepository;
	protected $productValidator;

	public function __construct(ProductRepositoryInterface $productRepository, ProductValidator $productValidator, TagRepositoryInterface $tagRepository, ImageRepositoryInterface $imageRepository)
	{
		$this->productRepository = $productRepository;
		$this->tagRepository = $tagRepository;
		$this->productValidator = $productValidator;
		$this->imageRepository = $imageRepository;
	}

	// CRUD Functions

	public function getIndex()
	{
		$products = $this->productRepository->all();

		return View::make('products.index', compact('products'));
	}

	public function getShow($productID)
	{
		$product = $this->productRepository->find($productID);

		return View::make('products.show', compact('product'));
	}

	public function getCreate()
	{
		$tags = $this->tagRepository->all();

		return View::make('products.create', compact('tags'));
	}

	public function postCreate()
	{
		$input = Input::only('name', 'pdf', 'description');

		$v = new $this->productValidator($input);

		if($v->passes())
		{
			// create slug
			$input['slug'] = Str::slug($input['name']);

			// create product in data store
			$product = $this->productRepository->create($input);
			
			$tags = Input::get('tags');
			$images = Input::get('images');

			// attach tags to product
			$this->productRepository->syncTags($product['id'], $tags);

			return Redirect::action('ListingController@getCreate');
		}

		return Redirect::action('ProductController@getCreate')
			->withErrors($v->errors)
			->with('error','Error creating Product');

	}

	public function getEdit($productID)
	{
		$product = $this->productRepository->find($productID);
		$tags = $this->tagRepository->all();

		return View::make('products.edit', compact('product', 'tags'));
	}

	public function postEdit($productID)
	{
		$input = Input::all();

		$v = new ProductValidator($input);
		
		if($v->passes())
		{
			$this->productRepository->update($productID, $input);

			return Redirect::action('ProductController@getIndex')
				->with('message','Product Created');
		}

		return Redirect::action('ProductController@getEdit')
			->withErrors($v->errors())
			->with('error','Error updating Product');
	}

	public function getDelete($productID)
	{
		$product = $this->productRepository->find($productID);

		return View::make('products.delete', compact('product'));
	}

	public function deleteDelete($productID)
	{
		$this->productRepository->delete($productID);

		return Redirect::action('ProductController@getIndex')
			->with('message','Product Deleted');
	}

	// Get listings for Product

	public function getListings($productID)
	{
		$product = $this->productRepository->findWith($productID, array('listings','listings.user'));

		return View::make('products.listings', compact('product'));
	}


}


