<?php namespace Swapshop\Image;

interface ImageRepositoryInterface
{
    public function add(Image $image);

    public function remove(Image $image);
}