<?php namespace Swapshop\Controllers;

class AuthController extends \BaseController {

	/**
	 * Show the login form
	 *
	 * @return mixed
	 */
	public function getLogin()
	{
		return \View::make('auth.login');
	}

	/**
	 * Process the login request
	 *
	 * @return mixed
	 */
	public function postLogin()
	{
		$input = \Input::only('username', 'password');

		if(\Auth::attempt($input, false))
		{
			return \Redirect::intended(\URL::route('dashboard'));
		}

		return \Redirect::route('login_path')->with('error','Incorrect username or password');
	}

	/**
	 * Log the user out
	 *
	 * @return mixed
	 */
	public function getLogout()
	{
		\Auth::logout();
		return \Redirect::route('login');
	}

}
