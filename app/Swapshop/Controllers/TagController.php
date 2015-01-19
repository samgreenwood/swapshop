<?php namespace Swapshop\Controllers;

use Swapshop\Tag;

class TagController extends \BaseController {

	/**
	 * @return mixed
	 */
	public function getIndex()
	{
		$tags = Tag::all();

		return \View::make('tags.index', compact('tags'));
	}

	/**
	 * @param $tagID
	 * @return mixed
	 */
	public function getShow($tagID)
	{
		$tag = Tag::findOrFail($tagID);

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
		$input = \Input::all();
        
        $tag = new Tag;

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

	/**
	 * @param $tagID
	 * @return mixed
	 */
	public function getEdit($tagID)
	{
		$tag = Tag::findOrFail($tagID);

		return \View::make('tags.edit', compact('tag'));
	}

	/**
	 * @param $tagID
	 * @return mixed
	 */
	public function putUpdate($tagID)
	{
		$input = \Input::all();
        
        $tag = Tag::find($tagID);

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

	/**
	 * @param $tagID
	 * @return mixed
	 */
	public function getDelete($tagID)
	{
		$tag = Tag::findOrFail($tagID);

		return \View::make('tags.delete', compact('tag'));
	}

	/**
	 * @param $tagID
	 * @return mixed
	 */
	public function deleteDelete($tagID)
	{
	    Tag::where('id', $tagID)->delete();

		return \Redirect::route('tags.index')
			->withMessage('Tag Deleted');
	}
}
