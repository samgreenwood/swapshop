<?php namespace Swapshop\Tag;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	/**
	 * Fields we can fill
	 *
	 * @var array
	 */
	protected $fillable = array('name', 'slug');

	/**
	 * Database table to use for a tag
	 *
	 * @var string
	 */
	protected $table = "swapshop_tags";

	/**
	 * Get all products for a tag
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function products()
	{
		return $this->belongsToMany('Swapshop\Product');
	}

	/**
	 * Mutator to automatically set the tag slug
	 *
	 * @param $value
	 */
	public function setNameAttribute($value)
	{
		$this->attributes['name'] = $value;
		$this->attributes['slug'] = \Str::slug($value);
	}

	/**
	 * @return mixed
	 */
	public function __toString()
	{
		return $this->name;
	}

}