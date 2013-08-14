<?php

use Illuminate\Database\Migrations\Migration;

class CreateSwapshopPurchasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('swapshop_purchases', function($table) 
		{
			$table->increments('id');
			$table->integer('quantity');
			$table->integer('listing_id')->unsigned();
			$table->foreign('listing_id')->references('id')->on('swapshop_listings');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('swapshop_users');
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
		Schema::drop('swapshop_purchases');
	}

}