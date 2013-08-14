<?php namespace Swapshop\Repositories;

interface BaseRepositoryInterface
{
	public function all();

	public function allWith(array $with);

	public function create($input);

	public function update($id, $input);

	public function find($id);

	public function findSlug($slug);

	public function findWith($id, array $with);

	public function findSlugWith($slug, array $with);

	public function delete($id);
}