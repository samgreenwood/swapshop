<?php namespace Swapshop\Listing;

use Swapshop\User;
use Swapshop\Product\Product;

interface ListingRepositoryInterface
{
    public function add(Listing $listing);

    public function remove(Listing $listing);

    public function getAll();

    public function getAllPaged($paged = 15);

    public function getById($id);

    public function getByProduct(Product $product);

    public function getBySeller(User $user);
}