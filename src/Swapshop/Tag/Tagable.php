<?php namespace Swapshop\Tag;

interface Tagable
{
    /**
     * @param Tag $tag
     * @return bool
     */
    public function tag(Tag $tag);

    /**
     * @param Tag $tag
     * @return bool
     */
    public function removeTag(Tag $tag);

    /**
     * @param array $tags
     * @return bool
     */
    public function setTags(array $tags);

    /**
     * @return array
     */
    public function getTags();

    /**
     * @return array
     */
    public function getTagsAsString();
}