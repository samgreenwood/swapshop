<?php namespace Swapshop;

use LaravelBook\Ardent\Ardent;

class Listing extends Ardent {

	protected $fillable = array('active', 'quantity', 'price', 'condition', 'notes', 'product_id', 'user_id');

	protected $table = "swapshop_listings";
	
	public function product()
	{
		return $this->belongsTo('Swapshop\Product');
	}

	public function user()
	{
		return $this->belongsTo('Swapshop\User');
	}

	public function purchases()
	{
		return $this->hasMany('Swapshop\Purchase');
	}

	public function images()
	{
		return $this->hasMany('Swapshop\Image');
	}

	public function seller()
	{
		return $this->user();
	}

}
