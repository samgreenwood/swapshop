<?php namespace Swapshop\Product;

interface ProductRepositoryInterface
{
    public function add(Product $product);

    public function remove(Product $product);

    public function getAll();

    public function getAllPaged($paged = 15);

    public function getById($id);

    public function getBySlug($slug);

    public function getBySlugWithListings($slug);

    public function getAllKeyValue();
}