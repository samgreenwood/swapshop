<?php namespace Swapshop\Listing;

use Swapshop\Product\Product;
use Swapshop\User;

class EloquentListingRepository implements ListingRepositoryInterface
{

    public function add(Listing $listing)
    {
        $listing->save();
    }

    public function remove(Listing $listing)
    {
        $listing->delete();
    }

    public function getAll()
    {
        return Listing::all();
    }

    public function getAllPaged($paged = 15)
    {
        return Listing::paginate($paged);
    }

    public function getById($id)
    {
        return Listing::find($id);
    }

    public function getByProduct(Product $product)
    {
        return Listing::where('product_id', $product->id)->get();
    }

    public function getBySeller(User $user)
    {
        return Listing::where('user_id', $user->id)->get();
    }
}