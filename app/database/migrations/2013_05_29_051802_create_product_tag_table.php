<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_tag', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('slug');
			$table->integer('tag_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->foreign('tag_id')->references('id')->on('swapshop_tags')->onDelete('cascade');;
			$table->foreign('product_id')->references('id')->on('swapshop_products')->onDelete('cascade');;
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
		Schema::drop('product_tag');
	}

}
