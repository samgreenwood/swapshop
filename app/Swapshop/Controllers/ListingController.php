<?php namespace Swapshop\Controllers;

use Swapshop\Listing;
use Swapshop\Product;

class ListingController extends \BaseController
{

    public function __construct(Listing $listing, Product $product)
    {
        $this->listing = $listing;
        $this->product = $product;
    }

    public function getIndex($product)
    {
        if(is_numeric($product))
        {
            $product = $this->product->find($product);
        }
        else
        {
            $product = $this->product->where('slug', $product)->first();
        }

        return \View::make('products.listings', compact('product'));
    }

    public function getShow($listingID)
    {
        $listing = $this->listing->findOrFail($listingID);

        return \View::make('listings.show', compact('listing'));
    }

    public function getCreate()
    {
        $products = $this->product->lists('name', 'id');

        return \View::make('listings.create', compact('products'));
    }

    public function postStore()
    {
        $input = \Input::only('product_id', 'quantity', 'price', 'condition', 'notes');

        $input['user_id'] = \Auth::user();
        $input['active'] = true;

        $listing = $this->listing->newInstance();

        $listing->fill($input);

        if($listing->save())
        {   
            return \Redirect::route('listings.edit', $listing->id)
                ->withMessage('Listing Created Successfully');
        }

        return \Redirect::back()
            ->withErrors($listing->errors())
            ->withError('Error creating Listing');

    }

    public function getEdit($listingID)
    {
        $listing = $this->listing->findOrFail($listingID);
        $products = $this->product->lists('name', 'id');

        return \View::make('listings.edit', compact('listing', 'products'));
    }

    public function putUpdate($listingID)
    {
        $input = \Input::only('product_id', 'quantity', 'price', 'condition', 'notes');

        $listing = $this->listing->findOrFail($listingID);

        $listing->fill($input);

        if($listing->save())
        {   
            return \Redirect::route('listings.edit', $listing->id)
                ->withMessage('Listing Created Successfully');
        }

        return \Redirect::back()
            ->withErrors($listing->errors())
            ->withError('Error creating Listing');
    }

}
