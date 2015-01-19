<?php namespace Swapshop;

use LaravelBook\Ardent\Ardent;

class Purchase extends Ardent {

	protected $fillable = array('user_id', 'listing_id', 'quantity', 'message');

	protected $table = "swapshop_purchases";

	public function listing()
	{
		return $this->belongsTo('Swapshop\Listing');
	}

	public function user()
	{
		return $this->belongsTo('Swapshop\User');
	}
}

?>