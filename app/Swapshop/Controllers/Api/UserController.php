<?php namespace Swapshop\Controllers\Api;

use Swapshop\Repositories\UserRepositoryInterface;

class UserController extends \BaseController
{	
	protected $userRepository;

	public function __construct(UserRepositoryInterface $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function getListings($id)
	{
		if(is_numeric($id))
		{
			$user = $this->userRepository->findWith($id, array('listings','listings.product'));
		}
		else
		{
			$user = $this->userRepository->findByUsernameWith($id, array('listings','listings.product'));
		}	
		
		$listings = $user['listings'];

		$listingsJson = array();

		foreach($listings as $listing)
		{
			if($listing['active'])
			{
				array_push($listingsJson, $listing);
			}
		}

		return \Response::json($listingsJson);
	}

}