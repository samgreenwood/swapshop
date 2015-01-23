<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwapshopListingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('swapshop_listings', function(Blueprint $table) 
		{
			$table->increments('id');
			$table->integer('quantity');
			$table->string('condition');
			$table->decimal('price', 5, 2);
			$table->text('notes');
			$table->boolean('active');
			$table->integer('product_id')->unsigned();
			$table->foreign('product_id')->references('id')->on('swapshop_products');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('swapshop_users');
			$table->softDeletes();
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
		Schema::drop('swapshop_listings');
	}

}