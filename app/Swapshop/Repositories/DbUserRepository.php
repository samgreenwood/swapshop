<?php namespace Swapshop\Repositories;

use Swapshop\User;

class DbUserRepository extends DbBaseRepository implements UserRepositoryInterface
{
	public function __construct(User $model)
	{
		parent::__construct($model);
	}

	public function findByUsername($username)
	{
		return $this->model->where('username','=',$username)->first()->toArray();
	}

	public function findByUsernameWith($username, array $with)
	{
		return $this->model->where('username','=',$username)->with($with)->first()->toArray();
	}
	
}

?>