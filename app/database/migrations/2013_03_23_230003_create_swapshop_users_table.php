<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwapshopUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('swapshop_users', function(Blueprint $table)
		{
			$table->integer('id')->primary()->unsigned();
			$table->string('username')->unique();
			$table->string('firstname');
			$table->string('surname');
			$table->string('email');	
			$table->text('signature')->nullable();
			$table->string('role');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('swapshop_users');
	}

}