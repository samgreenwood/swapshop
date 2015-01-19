<?php namespace Swapshop\Controllers;

use Swapshop\Product;
use Swapshop\Image;
use Swapshop\Tag;

class ProductController extends \BaseController
{

    /**
     * @return mixed
     */
    public function getIndex()
    {
        $products = Product::paginate('10');

        return \View::make('products.index', compact('products'));
    }

    /**
     * @param $productID
     * @return mixed
     */
    public function getShow($productID)
    {
        $product = Product::findOrFail($productID);

        return \View::make('products.show', compact('product'));
    }

    /**
     * @return mixed
     */
    public function getCreate()
    {
        $tags = Tag::lists('name', 'id');

        return \View::make('products.create', compact('tags'));
    }

    /**
     * @return mixed
     */
    public function postStore()
    {
        $input = \Input::only('name', 'pdf', 'description');
        $tags = \Input::get('tags') ? \Input::get('tags') : array();

        $product = new Product;

        $product->fill($input);

        if ($product->save()) {
            $product->tags()->sync($tags);
            $this->uploadImages($product->id);

            return \Redirect::route('products.show', $product->id)
                ->withMessage('Product Created Successfully');
        }

        return \Redirect::back()
            ->withErrors($product->errors())
            ->withError('Error creating Product');
    }

    /**
     * @param $productID
     * @return mixed
     */
    public function getEdit($productID)
    {
        $product = Product::findOrFail($productID);
        $productTags = $product->tags()->lists('tag_id');
        $tags = Tag::lists('name', 'id');

        return \View::make('products.edit', compact('product', 'tags', 'productTags'));
    }

    /**
     * @param $productID
     * @return mixed
     */
    public function putUpdate($productID)
    {
        $input = \Input::only('name', 'pdf', 'description');
        $tags = \Input::get('tags') ? \Input::get('tags') : array();

        $product = Product::findOrFail($productID);

        $product->fill($input);

        if ($product->save()) {
            $product->tags()->sync($tags);
            $this->uploadImages($product->id);

            return \Redirect::route('products.show', $product->id)
                ->withMessage('Product Created Successfully');
        }

        return \Redirect::back()
            ->withErrors($product->errors())
            ->withError('Error creating Product');

    }

    /**
     * @param $productID
     * @return mixed
     */
    public function getDelete($productID)
    {
        $product = Product::find($productID);

        return \View::make('products.delete', compact('product'));
    }

    /**
     * @param $productID
     * @return mixed
     */
    public function deleteDelete($productID)
    {
        $product = Product::find($productID);
        $product->delete();

        return \Redirect::route('products.index')
            ->withMessage('Product Deleted');
    }

    /**
     * @param $productID
     * @return mixed
     */
    public function getListings($productID)
    {
        $product = $this->productRepository->findWith($productID, array('listings', 'listings.user', 'images'));

        return \View::make('products.listings', compact('product'));
    }

    /**
     * Show all the Products in a certain tag
     * @param $tag The tag to filter by
     * @return \Response
     */
    public function getTag($tag)
    {
        $tag = Tag::with(array('products'))->where('slug', $tag)->first();

        $tag->products = $tag->products->filter(function ($product) {
            return $product->isSellable();
        });

        return \View::make('tags.products', compact('tag'));
    }

    /**
     * @param $productID
     */
    private function uploadImages($productID)
    {
        if (\Input::hasFile('image')) {
            $imageInput = \Input::file('image');
            $filename = $imageInput->getClientOriginalName();
            $path = public_path() . '/images/products/' . $productID;

            if ($imageInput->move($path, $filename)) {
                $image['image'] = $filename;
                $image['imageable_type'] = "Swapshop\Product";
                $image['imageable_id'] = $productID;

                Image::create($image);
            }
        }
    }

}
