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

}