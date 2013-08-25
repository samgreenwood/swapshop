<?php namespace Swapshop\Controllers;

use Swapshop\Repositories\ProductRepositoryInterface;

class SearchController extends \BaseController {

	protected $productRepository;

	public function __construct(ProductRepositoryInterface $productRepository)
	{
		$this->productRepository = $productRepository;
	}

	public function getIndex()
	{
		return \View::make('search.index');
	}

	public function postIndex()
	{
		$keywords = explode(" ", \Input::get('search'));

		$products = $this->productRepository->allWith(array('tags','images','listings'));

		$results = array();

		foreach($products as $product)
		{
			foreach($keywords as $keyword)
			{
				$keyword = strtolower($keyword);

				if(strpos($product['slug'], $keyword) !== FALSE)
				{
					$results[$product['id']] = $product;
				} 
				else if(strpos(strtolower($product['description']), $keyword))
				{
					$results[$product['id']] = $product;
				}
				else
				{
					// check for keyword in tags
					foreach($product['tags'] as $tag)
					{
						if(strpos($tag['slug'], $keyword) !== FALSE)
						{
							$results[$product['id']] = $product;
						}
					}
				}
			}
			
		}

		return \View::make('search.results', compact('results'));
	}

}