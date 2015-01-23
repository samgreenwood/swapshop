<?php

use Mockery as m;
use Swapshop\Tag\Tagable;
use Illuminate\Support\Str;
use Swapshop\Tag\TagRepositoryInterface;

class TagTest extends TestCase
{
    public function test_tagger_creates_non_existant_tags()
    {
        $tagRepositoryInterface = m::mock(TagRepositoryInterface::class)->shouldReceive('add')->once()->shouldReceive('getBySlug')->once()->with('test-name')->getMock();
        $str = m::mock(Str::class)->shouldReceive('slug')->once()->with('Test Name')->andReturn('test-name')->getMock();
        $tagable = m::mock(Tagable::class)->shouldReceive('setTags')->once()->getMock();

        $tagger = new \Swapshop\Tag\Tagger($tagRepositoryInterface, $str);
        $tagger->tag($tagable, ['Test Name']);
    }
}