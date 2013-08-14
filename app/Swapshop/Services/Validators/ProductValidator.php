<?php namespace Swapshop\Services\Validators;

class ProductValidator extends BaseValidator
{
	public static $rules = array(
		'name' => 'required',
		'pdf' => 'required'
	);
}