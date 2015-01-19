<?php namespace Swapshop\Controllers;

use Swapshop\User;

class DashboardController extends \BaseController
{
    public function getIndex()
    {
        return \View::make('home');
    }

    public function getMySwapshop()
    {
        $user = \Auth::user();
        return \View::make('users.dashboard', compact('user'));
    }

}
