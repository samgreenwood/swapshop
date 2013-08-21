<?php namespace Swapshop\Controllers;

use \View;
use \Redirect;
use \Input;

use Swapshop\Repositories\UserRepositoryInterface;
use Swapshop\Services\Validators\UserValidator;

class UserController extends \BaseController {	
	
	public $restful = true;

	protected $userRepository;

	public function __construct(UserRepositoryInterface $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function getIndex()
	{
		return View::make('home');
	}

	public function getDashboard()
	{
		$user = $this->userRepository->findWith(\Auth::user(), array('listings','listings.product'));
		
		return View::make('users.dashboard', compact('user'));
	}

	public function postDashboard()
	{
		$input = Input::only('signature');

		$updated = $this->userRepository->update(Auth::user(), $input);
		
		if($updated)
		{
			return Redirect::action('UserController@getDashboard')->with('message', 'User profile updated');
		}

		return Redirect::action('UserController@getDashboard')->with('message', 'Error updating profile');
	}

}