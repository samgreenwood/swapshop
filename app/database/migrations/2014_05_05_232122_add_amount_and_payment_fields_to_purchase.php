<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAmountAndPaymentFieldsToPurchase extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::table('swapshop_purchases', function($table)
	    {
	       $table->decimal('amount')->nullable();
	       $table->boolean('payment_recieved')->nullable();
	       $table->boolean('payment_sent')->nullable();
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
