<?php namespace Swapshop\Controllers;

use Swapshop\User;
use Swapshop\Tag;

class DashboardController extends \BaseController
{
    public function getIndex()
    {
	$tags = Tag::all();
        return \View::make('home', compact('tags'));
    }

    public function getMySwapshop()
    {
        $user = \Auth::user();
        return \View::make('users.dashboard', compact('user'));
    }

}
