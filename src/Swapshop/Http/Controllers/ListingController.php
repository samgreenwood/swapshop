<?php namespace Swapshop\Http\Controllers;

use Swapshop\Listing;
use Swapshop\Product;

class ListingController extends BaseController
{

    /**
     * @param $product
     * @return mixed
     */
    public function getIndex($product)
    {
        $product = is_numeric($product) ? Product::find($product) : Product::where('slug', $product)->first();

        return \View::make('products.listings', compact('product'));
    }

    /**
     * @param $listingID
     * @return mixed
     */
    public function getShow($listingID)
    {
        $listing = Listing::findOrFail($listingID);

        return \View::make('listings.show', compact('listing'));
    }

    /**
     * @return mixed
     */
    public function getCreate()
    {
        $products = Product::lists('name', 'id');

        return \View::make('listings.create', compact('products'));
    }

    /**
     * @return mixed
     */
    public function postStore()
    {
        $input = \Input::only('product_id', 'quantity', 'price', 'condition', 'notes');

        $input['user_id'] = \Auth::user()->getKey();
        $input['active'] = true;

        $listing = new Listing;

        $listing->fill($input);

        if ($listing->save()) {
            return \Redirect::route('listings.edit', $listing->id)
                ->withMessage('Listing Created Successfully');
        }

        return \Redirect::back()
            ->withErrors($listing->errors())
            ->withError('Error creating Listing');

    }

    /**
     * @param $listingID
     * @return mixed
     */
    public function getEdit($listingID)
    {
        $listing = Listing::findOrFail($listingID);
        $products = Product::lists('name', 'id');

        return \View::make('listings.edit', compact('listing', 'products'));
    }

    /**
     * @param $listingID
     * @return mixed
     */
    public function putUpdate($listingID)
    {
        $input = \Input::only('product_id', 'quantity', 'price', 'condition', 'notes');

        $listing = Listing::findOrFail($listingID);

        $listing->fill($input);

        if ($listing->save()) {
            return \Redirect::route('listings.edit', $listing->id)
                ->withMessage('Listing Created Successfully');
        }

        return \Redirect::back()
            ->withErrors($listing->errors())
            ->withError('Error creating Listing');
    }

}
