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
	
	$tagRepository = App::make('Swapshop\Repositories\TagRepositoryInterface');
	
	$view->with('user', Auth::user());
	$view->with('tags', $tagRepository->all());
});