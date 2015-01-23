<?php namespace Swapshop\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Swapshop\Image\Image;
use Swapshop\Image\Imageable;
use Swapshop\Listing;
use Swapshop\Tag\Tag;
use Swapshop\Tag\Tagable;

class Product extends Model implements Tagable, Imageable
{
    use SoftDeletingTrait;

    /**
     * Attributes that can be mass assigned
     *
     * @var array
     */
    protected $fillable = array('name', 'description', 'pdf', 'slug');

    /**
     * Database table to use for model
     *
     * @var string
     */
    protected $table = "swapshop_products";

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = \Str::slug($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function listings()
    {
        return $this->hasMany(Listing::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * Tag a product with the given tag
     *
     * @param Tag $tag
     * @return bool
     */
    public function tag(Tag $tag)
    {
        return $this->tags()->attach($tag->getKey());
    }

    /**
     * @param Tag $tag
     * @return bool
     */
    public function removeTag(Tag $tag)
    {
        return $this->tags()->detach($tag->getKey());
    }

    /**
     * Mass assign the tags to the product
     *
     * @param array $tags
     * @return array
     */
    public function setTags(array $tags)
    {
        $ids = [];
        foreach($tags as $tag) $ids[] = $tag->getKey();

        return $this->tags()->sync($ids);
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @return string
     */
    public function getTagsAsString()
    {
        return $this->tags->lists('name');
    }

    /**
     * Get the path images for the product should be uploaded
     *
     * @return string
     */
    public function getPath()
    {
        return sprintf("/public/products/%s/images", $this->getKey());
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->name;
    }
}