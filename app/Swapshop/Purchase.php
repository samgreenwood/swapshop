<?php namespace Swapshop;

class Purchase extends \Eloquent {

	protected $fillable = array('user_id', 'listing_id', 'quantity');

	protected $table = "swapshop_purchases";

	public function listing()
	{
		return $this->belongsTo('Swapshop\Listing');
	}

	public function buyer()
	{
		return $this->belongsTo('Swapshop\User');
	}

	public function seller()
	{
		return $this->listing()->user;
	}

}

?>