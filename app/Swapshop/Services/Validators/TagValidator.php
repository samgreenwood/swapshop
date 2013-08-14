<?php namespace Swapshop\Services\Validators;

class TagValidator extends BaseValidator
{
	public static $rules = array(
		'name' => 'required'
	);
}