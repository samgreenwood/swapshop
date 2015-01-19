<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		\Swapshop\User::create([
			'username' => 'admin',
			'password' => 'admin',
			'firstname' => 'admin',
			'surname' => 'admin',
			'role' => 'admin',
		]);

		\Swapshop\User::create([
			'username' => 'dragoon',
			'password' => 'dragoon',
			'firstname' => 'dragoon',
			'surname' => 'dragoon',
			'role' => 'dragoon',
		]);
	}

}