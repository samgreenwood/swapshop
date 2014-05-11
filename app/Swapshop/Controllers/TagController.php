<?php namespace Swapshop\Controllers;

use Swapshop\Tag;

class TagController extends \BaseController {

    protected $tag;

	public function __construct(Tag $tag)
	{
	    $this->tag = $tag;
	}

	public function getIndex()
	{
		$tags = $this->tag->all();

		return \View::make('tags.index', compact('tags'));
	}

	public function getShow($tagID)
	{
		$tag = $this->tag->findOrFail($tagID);

		return \View::make('tags.show', compact('tag'));
	}

	public function getCreate()
	{
		return \View::make('tags.create');
	}

	public function postStore()
	{
		$input = \Input::all();
        
        $tag = $this->tag->newInstance();

        $tag->fill($input);

        if($tag->save())
        {
            return \Redirect::route('tags.index')
                ->withMessage('Tag Created Successfully');
        }

        return \Redirect::back()
            ->withErrors($tag->errors())
            ->withError('Error creating Tag');
	}

	public function getEdit($tagID)
	{
		$tag = $this->tag->findOrFail($tagID);

		return \View::make('tags.edit', compact('tag'));
	}

	public function putUpdate($tagID)
	{
		$input = \Input::all();
        
        $tag = $this->tag->find($tagID);

        $tag->fill($input);

        if($tag->save())
        {
            return \Redirect::route('tags.index')
                ->withMessage('Tag Created Successfully');
        }

        return \Redirect::back()
            ->withErrors($tag->errors())
            ->withError('Error updating Tag');

	}

	public function getDelete($tagID)
	{
		$tag = $this->tag->findOrFail($tagID);

		return \View::make('tags.delete', compact('tag'));
	}

	public function deleteDelete($tagID)
	{
	    $this->tag->where('id', $tagID)->delete();

		return \Redirect::route('tags.index')
			->withMessage('Tag Deleted');
	}
}
