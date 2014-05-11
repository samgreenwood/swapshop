<?php namespace Swapshop;

use LaravelBook\Ardent\Ardent;

class Tag extends Ardent
{
	protected $fillable = array('name', 'slug');
    
	protected $table = "swapshop_tags";

	public static $rules = array(
	    'name' => 'required'
	);
		
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
