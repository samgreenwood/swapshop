<?php namespace Swapshop\Product;

class EloquentProductRepository implements ProductRepositoryInterface
{
    /**
     * @param Product $product
     */
    public function add(Product $product)
    {
        return $product->save();
    }

    /**
     * @param Product $product
     */
    public function remove(Product $product)
    {
        return $product->delete();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return Product::all();
    }

    /**
     * @return mixed
     */
    public function getAllKeyValue()
    {
        return Product::lists('name', 'id');
    }

    /**
     * @param int $paged
     * @return mixed
     */
    public function getAllPaged($paged = 15)
    {
        return Product::paginate($paged);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return Product::findOrFail($id);
    }

    /**
     * @param $slug
     */
    public function getBySlug($slug)
    {
        return Product::where('slug', $slug)->first();
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function getBySlugWithListings($slug)
    {
        return Product::with(['listings'])->where('slug', $slug)->first();
    }
}