<?php namespace Swapshop;

class Product extends \Eloquent {

	protected $fillable = array('name', 'description', 'pdf', 'slug');

	protected $table = "swapshop_products";
    
    public static $rules = array(
        'name'  => 'required',
        'pdf'   => 'required',
        'description'   => 'required'
    );

	public function listings()
	{
		return $this->hasMany('Swapshop\Listing');
	}

	public function active_listing()
	{
		return $this->hasOne('Swapshop\Listing')
			->where('active', '=', 1)
			->where('quantity', '>', 0)
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
				\DB::raw('max(price) as max_price'),
				\DB::raw('avg(price) as avg_price')
		)->first();
	}
    
    public function isSellable()
    {   
        $hasActiveListing = $this->active_listing();

        if($hasActiveListing)
        { 
            return $hasActiveListing->total_quantity > 0;
        }

        return false;
    }

    public function maxPrice()
    {
        return array_get($this->active_listing(), 'max_price');
    }

    public function minPrice()
    {
        return array_get($this->active_listing(), 'max_price');
    }

    public function averagePrice()
    {
        return array_get($this->active_listing(), 'avg_price');
    }

    public function availableQuantity()
    {
        return array_get($this->active_listing(), 'total_quantity');
    }

    public function activeListings()
    {
        return $this->listings()->where('active', true)->get();
    }

    public function displayPrice()
    {
        if($this->minPrice() != $this->maxPrice())
        {
            $avgPrice = $this->averagePrice();
            return "~$" . number_format($avgPrice, 2);
        }

        return "$" . number_format($this->minPrice(), 2);
    }

	public function tags()
	{
		return $this->belongsToMany('Swapshop\Tag');
	}

	public function images()
	{
		return $this->morphMany('Swapshop\Image', 'imageable');
	}

	public function firstImage()
	{
	    return $this->images()->first();
	}
    
    public function getFirstImageAttribute($value)
    {
        return $this->firstImage();
    }

	public function __toString()
	{
		return $this->name;
	}

}
