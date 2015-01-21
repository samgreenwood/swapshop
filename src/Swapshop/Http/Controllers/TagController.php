<?php namespace Swapshop\Http\Controllers;

use Swapshop\Tag\Forms\EditTagForm;
use Swapshop\Tag\Tag;
use Swapshop\Tag\Forms\CreateTagForm;
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
        $tags = $this->tagRepository->getAll();

        return \View::make('tags.index', compact('tags'));
    }

    /**
     * @param $tagId
     * @return mixed
     */
    public function getShow($tagId)
    {
        $tag = $this->tagRepository->getById($tagId);

        return \View::make('tags.show', compact('tag'));
    }

    /**
     * @return mixed
     */
    public function getCreate()
    {
        return \View::make('tags.create');
    }

    /**
     * @return mixed
     */
    public function postStore()
    {
        $form = $this->form(CreateTagForm::class);

        $name = $form->get('name');

        $tag = new Tag;
        $tag->name = $name;

        $this->tagRepository->add($tag);

        return $this->redirect()->route('tags.index')->withMessage('Tag Created');
    }

    /**
     * @param $tagId
     * @return mixed
     */
    public function getEdit($tagId)
    {
        $tag = $this->tagRepository->getById($tagId);

        return \View::make('tags.edit', compact('tag'));
    }

    /**
     * @param $tagId
     * @return mixed
     */
    public function putUpdate($tagId)
    {
        $form = $this->form(EditTagForm::class);

        $name = $form->get('name');

        $tag = $this->tagRepository->getById($tagId);
        $tag->name = $name;

        $this->tagRepository->add($tag);

        return \Redirect::route('tags.index')->withMessage('Tag Updated');
    }

    /**
     * @param $tagId
     * @return mixed
     */
    public function getDelete($tagId)
    {
        $tag = $this->tagRepository->getById($tagId);

        return \View::make('tags.delete', compact('tag'));
    }

    /**
     * @param $tagId
     * @return mixed
     */
    public function deleteDelete($tagId)
    {
        $tag = $this->tagRepository->getById($tagId);

        $this->tagRepository->remove($tag);

        return \Redirect::route('tags.index')
            ->withMessage('Tag Deleted');
    }
}
