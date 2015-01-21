<?php namespace Swapshop\Tag;

use Illuminate\Support\Str;
use Swapshop\Tag\TagRepositoryInterface;

class Tagger
{
    /**
     * @var TagRepositoryInterface
     */
    private $tagRepository;
    /**
     * @var Str
     */
    private $str;

    /**
     * @param TagRepositoryInterface $tagRepository
     * @param Str $str
     */
    public function __construct(TagRepositoryInterface $tagRepository, Str $str)
    {
        $this->tagRepository = $tagRepository;
        $this->str = $str;
    }

    /**
     * @param Tagable $tagable
     * @param array $tagNames
     */
    public function tag(Tagable $tagable, array $tagNames = [])
    {
        $tags = [];

        foreach ($tagNames as $tagName) {

            $slug = $this->str->slug($tagName);

            if ( ! $t = $this->tagRepository->getBySlug($slug)) {
                $tag = new Tag;
                $tag->name = $tagName;
                $this->tagRepository->save($tag);
            }

            $tagArr[] = $tag;
        }

        $tagable->setTags($tags);

    }

}
