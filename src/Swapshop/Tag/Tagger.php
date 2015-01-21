<?php namespace Swapshop\Tag;

use Swapshop\Tag\Tag\TagRepositoryInterface;

class Tagger
{
    /**
     * @var TagRepositoryInterface
     */
    private $tagRepository;

    /**
     * @param TagRepositoryInterface $tagRepository
     */
    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * Set the tags on a tagable entity
     *
     * @param Tagable $tagable
     * @param array $tags
     */
    public function tag(Tagable $tagable, $tags = [])
    {
        $tags = array_filter($tags, function($tag)
        {
            return $tag instanceof Tag;
        });

        $tagable->setTags($tags);

    }
}
