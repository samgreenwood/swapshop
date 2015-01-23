<?php namespace Swapshop\Http\Controllers\Api;

use Swapshop\Http\Controllers\BaseController;
use Swapshop\Tag\TagRepositoryInterface;

class TagController extends BaseController
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
     * @return mixed
     */
    public function getIndex()
    {
        $tags = $this->tagRepository->getAllKeyValue();

        return \Response::json($tags, 200);
    }
}