<?php namespace Swapshop\Controllers\Api;

use Swapshop\User;

class UserController extends \BaseController
{	
	public function getListings($id)
	{
		if(is_numeric($id))
		{
			$user = User::with('listings')->find($id);
		}
		else
		{
			$user = User::with('litsings')->where('username', $id)-first();
		}	

		$listings = $user->listings;

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