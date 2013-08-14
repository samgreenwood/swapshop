<?php namespace Swapshop;

class Product extends \Eloquent {

	protected $fillable = array('name', 'description', 'pdf', 'slug');

	protected $table = "swapshop_products";

	public function listings()
	{
		return $this->hasMany('Swapshop\Listing');
	}

	public function tags()
	{
		return $this->belongsToMany('Swapshop\Tag');
	}

	public function images()
	{
		return $this->morphMany('Swapshop\Image', 'imageable');
	}

	public function __toString()
	{
		return $this->name;
	}

}