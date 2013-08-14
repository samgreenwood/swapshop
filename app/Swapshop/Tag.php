<?php namespace Swapshop;

class Tag extends \Eloquent	
{
	protected $fillable = array('name', 'slug');
	
	protected $table = "swapshop_tags";
		
	public function products()
	{
		return $this->belongsToMany('Swapshop\Product');
	}

	public function __toString()
	{
		return $this->name;
	}

}

?>