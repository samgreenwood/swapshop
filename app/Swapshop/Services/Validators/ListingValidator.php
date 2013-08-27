<?php namespace Swapshop\Services\Validators;

class ListingValidator extends BaseValidator
{
	public static $rules = array(
		'quantity' => 'required|numeric',
		'price' => 'required|numeric',
	);
}