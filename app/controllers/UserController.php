<?php

use Swapshop\Repositories\UserRepositoryInterface;
use Swapshop\Services\Validators\UserValidator;

class UserController extends BaseController {	
	
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
		return View::make('users.dashboard',compact('user'));
	}

	public function postDashboard()
	{
		$input = Input::all();

		dd($input);
	}

}