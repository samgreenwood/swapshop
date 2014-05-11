<?php namespace Swapshop;

class Sale extends \Eloquent
{
	protected $table = "swapshop_purchases";

	public function buyer()
	{
	    return $this->belongsTo('Swapshop\User', 'user_id');
	}

	public function seller()
	{
	    return $this->hasManyThrough('Swapshop\Listing', 'Swapshop\User', 'id', 'listing_id');
	}

	public function listing()
	{
	    return $this->belongsTo('Swapshop\Listing');
	}

}
