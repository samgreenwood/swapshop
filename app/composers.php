<?php
/*
|--------------------------------------------------------------------------
| View composers
|--------------------------------------------------------------------------
|
| Below you will find the view composers for the application
|
*/

View::composer('layouts.master', function($view) {
	
	$tag = App::make('Swapshop\Tag');
	$userRepository = App::make('Swapshop\Repositories\UserRepositoryInterface');
	
	$view->with('user', $userRepository->find(Auth::user()));
	$view->with('tags', $tag->all());
});
