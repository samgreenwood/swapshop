<?php namespace Swapshop\Image;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * @var string
     */
    protected $table = "swapshop_images";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function imageable()
    {
        return $this->morphTo();
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->image;
    }

}
