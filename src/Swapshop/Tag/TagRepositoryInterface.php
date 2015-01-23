<?php namespace Swapshop\Tag;

interface TagRepositoryInterface
{
    public function add(Tag $tag);

    public function remove(Tag $tag);

    public function getAll();

    public function getById($id);

    public function getBySlug($slug);

    public function getBySlugWithProducts($slug);

    public function getAllKeyValue();
}