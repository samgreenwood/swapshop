<?php namespace Swapshop\Image;

class EloquentImageRepository implements ImageRepositoryInterface
{
    /**
     * @param Image $image
     * @return bool
     */
    public function add(Image $image)
    {
        return $image->save();
    }

    /**
     * @param Image $image
     */
    public function remove(Image $image)
    {
        $image->delete();
    }
}