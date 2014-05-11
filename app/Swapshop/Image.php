<?php namespace Swapshop;

class Image extends \Eloquent {

	protected $fillable = array('imageable_id', 'imageable_type', 'image');

	protected $table = "swapshop_images";

	public function imageable()
	{
		return $this->morphTo();
	}

	public function path()
	{
	    return '/images/products/' . $this->imageable_id . '/' . $this->image; 
	}

	public function __toString()
	{
		return $this->image;
	}

}
