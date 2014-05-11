<?php namespace Swapshop\Controllers;

use Swapshop\Product;
use Swapshop\Image;
use Swapshop\Tag;

class ProductController extends \BaseController {
    
    protected $product;

    protected $tag;
    
    protected $image;
    
	public function __construct(Product $product, Tag $tag, Image $image)
	{
	    $this->product = $product;
	    $this->tag = $tag;
	    $this->image = $image;
	}

	public function getIndex()
	{
		$products = $this->product->paginate('10');

		return \View::make('products.index', compact('products'));
	}

	public function getShow($productID)
	{
		$product = $this->product->findOrFail($productID);

		return \View::make('products.show', compact('product'));
	}

	public function getCreate()
	{
		$tags = $this->tag->lists('name', 'id');

		return \View::make('products.create', compact('tags'));
	}

	public function postStore()
	{
		$input = \Input::only('name', 'pdf', 'description');
        $tags = \Input::get('tags') ? \Input::get('tags') : array();

        $product = $this->product->newInstance();

        $product->fill($input);

        if($product->save())
        {
            $product->tags()->sync($tags);
            $this->uploadImages($product->id);

            return \Redirect::route('products.show', $product->id)
                ->withMessage('Product Created Successfully');
        }

        return \Redirect::back()
            ->withErrors($product->errors())
            ->withError('Error creating Product');
	}

	public function getEdit($productID)
	{
		$product = $this->product->findOrFail($productID);
        $productTags = $product->tags()->lists('tag_id');
		$tags = $this->tag->lists('name', 'id');

		return \View::make('products.edit', compact('product', 'tags', 'productTags'));
	}

	public function putUpdate($productID)
	{
		$input = \Input::only('name', 'pdf', 'description');
        $tags = \Input::get('tags') ? \Input::get('tags') : array();

        $product = $this->product->findOrFail($productID);

        $product->fill($input);

        if($product->save())
        {
            $product->tags()->sync($tags);
            $this->uploadImages($product->id);

            return \Redirect::route('products.show', $product->id)
                ->withMessage('Product Created Successfully');
        }

        return \Redirect::back()
            ->withErrors($product->errors())
            ->withError('Error creating Product');
 
	}

	public function getDelete($productID)
	{
		$product = $this->product->find($productID);

		return \View::make('products.delete', compact('product'));
	}

	public function deleteDelete($productID)
	{
		$product = $this->product->find($productID);
        $product->delete();
        
        return \Redirect::route('products.index')
            ->withMessage('Product Deleted');
	}
    
	// Get listings for Product

	public function getListings($productID)
	{
		$product = $this->productRepository->findWith($productID, array('listings','listings.user','images'));

		return \View::make('products.listings', compact('product'));
	}

	/**
	 * Show all the Products in a certain tag
	 * @param $tag The tag to filter by
	 * @return \Response
	 */
	 public function getTag($tag)
	 {
	    $tag = $this->tag->with(array('products'))->where('slug', $tag)->first();

        $tag->products = $tag->products->filter(function($product)
        {
            return $product->isSellable();
        });

	    return \View::make('tags.products', compact('tag'));
	 }

	// Handle image uploads

	private function uploadImages($productID)
	{
		if(\Input::hasFile('image'))
		{
			$imageInput = \Input::file('image');
			$filename = $imageInput->getClientOriginalName();
			$path = public_path() . '/images/products/' . $productID;

			if($imageInput->move($path, $filename))
			{
				$image['image'] = $filename;
				$image['imageable_type'] = "Swapshop\Product";
				$image['imageable_id'] = $productID;

				$uploadedImage = $this->image->create($image);
			}	
		}
	}

}
