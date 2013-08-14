<?php namespace Swapshop\Repositories;

use Swapshop\User;

class DbUserRepository extends DbBaseRepository implements UserRepositoryInterface
{
	public function __construct(User $model)
	{
		parent::__construct($model);
	}
	
}

?>