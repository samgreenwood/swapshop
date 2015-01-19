<?php namespace Swapshop\Controllers;

use Swapshop\Product;

class SearchController extends \BaseController {

	/**
	 * @return mixed
	 */
	public function getIndex()
	{
		return \View::make('search.index');
	}

	/**
	 * @return mixed
	 */
	public function postIndex()
	{
		$keywords = explode(" ", \Input::get('search'));

		$products = Product::with(array('tags','images','listings'))->get();

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