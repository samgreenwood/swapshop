<?php namespace Swapshop;

class Product extends \Eloquent {

	protected $fillable = array('name', 'description', 'pdf', 'slug');

	protected $table = "swapshop_products";

	public function listings()
	{
		return $this->hasMany('Swapshop\Listing')
			->where('active', '=', 1)
			->groupBy('product_id')
			->select(
				'id',
				'quantity',
				'condition',
				'price',
				'notes',
				'product_id',
				'user_id',
				'created_at',
				'updated_at',
				\DB::raw('count(product_id) as num_listings'),
				\DB::raw('sum(quantity) as total_quantity'),
				\DB::raw('min(price) as min_price'),
				\DB::raw('max(price) as max_price')
			);
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