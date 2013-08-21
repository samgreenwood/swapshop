<?php namespace Swapshop\Controllers;

use Swapshop\Repositories\UserRepositoryInterface;

class AuthController extends \BaseController {

	public $restful = true;
	
	protected $userRepository;
	
	public function __construct(UserRepositoryInterface $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function getLogin()
	{
		return \View::make('auth.login');
	}

	public function postLogin()
	{
		$input = \Input::only('username', 'password');

		if(Auth::attempt($input, true))
		{
			$ldapUser = \Auth::user();

			// See if user exists in database
			$user = $this->userRepository->find($ldapUser->id);
	
			// if first time user logging in to swapshop 
			if(is_null($user))
			{
				// create user in local database so we can store application specific data
				$user = $this->userRepository->create($ldapUser->toArray());
			}
			else
			{
				// update local data from ldap
				$user = $this->userRepository->update($ldapUser->id, $ldapUser->toArray());
			}

			// set Auth::user to the Eloquent instance of our model so we can access additional properties
			// need to think of implimentation
			return \Redirect::intended(\URL::action('Swapshop\Controllers\UserController@getDashboard'));

		}

		return \Redirect::action('Swapshop\Controllers\AuthController@getLogin')->with('error','Incorrect username or password');
	}

	public function getLogout()
	{
		\Auth::logout();
		return \Redirect::action('Swapshop\Controllers\AuthController@getLogin');
	}

}