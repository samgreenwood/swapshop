<?php namespace Swapshop\Http\Controllers;

class DashboardController extends BaseController
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
