<?php namespace Swapshop\Tag;

use Swapshop\Tag\Tag;
use Swapshop\Tag\TagRepositoryInterface;

class EloquentTagRepository implements TagRepositoryInterface
{
    /**
     * @param Tag $tag
     */
    public function add(Tag $tag)
    {
        $tag->save();
    }

    /**
     * @param Tag $tag
     */
    public function remove(Tag $tag)
    {
        $tag->delete();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return Tag::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return Tag::find($id);
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug)
    {
        return Tag::where('slug', $slug)->first();
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function getBySlugWithProducts($slug)
    {
        return Tag::with(['products'])->where('slug', $slug)->first();
    }

    /**
     * @return mixed
     */
    public function getAllKeyValue()
    {
        return Tag::lists('name', 'id');
    }
}