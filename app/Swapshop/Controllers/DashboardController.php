<?php namespace Swapshop\Controllers;

use Swapshop\User;

class DashboardController extends \BaseController
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getIndex()
    {
        return \View::make('home');
    }

    public function getMySwapshop()
    {
        $userID = \Auth::user();
        $user = $this->user->findOrFail($userID);
        return \View::make('users.dashboard', compact('user'));
    }

}
