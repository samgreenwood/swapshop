<?php namespace Swapshop\Tag;

interface Tagable
{
    public function tag(Tag $tag);

    public function removeTag(Tag $tag);

    public function setTags(array $tags);
}