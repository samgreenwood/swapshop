<?php namespace Swapshop\Controllers;

use \View;
use \Redirect;
use \Input;

use Swapshop\Repositories\ImageRepositoryInterface;
use Swapshop\Services\Validators\ImageValidator;

class ImageController extends \BaseController {

	protected $imageRepository;

	public function __construct(imageRepositoryInterface $imageRepository)	
	{
		$this->imageRepository = $imageRepository;
	}

	public function deleteDelete($id)
	{
		$image = $this->imageRepository->find($id);

		$this->imageRepository->delete($id);

		if($image['imageable_type'] == "Swapshop\Product")
		{
			return Redirect::action('Swapshop\Controllers\ProductController@getEdit', $image['imageable_id']);
		}
		else if($image['imageable_type'] == "Swapshop\Listing")
		{
			return Redirect::action('Swapshop\Controllers\ListingController@getEdit', $image['imageable_id']);
		}
		
	}

}