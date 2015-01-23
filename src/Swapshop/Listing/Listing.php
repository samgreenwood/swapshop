<?php namespace Swapshop\Listing;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Swapshop\Image\Imageable;

class Listing extends Model implements Imageable
{

    use SoftDeletingTrait;

    protected $fillable = array('active', 'quantity', 'price', 'condition', 'notes', 'product_id', 'user_id');

    protected $table = "swapshop_listings";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('Swapshop\Product\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Swapshop\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchases()
    {
        return $this->hasMany('Swapshop\Purchase');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('Swapshop\Image');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller()
    {
        return $this->user();
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return sprintf("/public/listings/%s/images", $this->getKey());
    }
}
