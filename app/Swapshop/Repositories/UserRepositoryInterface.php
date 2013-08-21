<?php namespace Swapshop\Repositories;

interface UserRepositoryInterface {

	public function findByUsername($username);
	
	public function findByUsernameWith($username, array $with);

}