<?php namespace Swapshop\Services\Validators;

use \Validator;
use \Input;

abstract class BaseValidator
{	
	protected $data;

    public $errors;

    public static $rules;

    public static $messages = array();

    public function passes($data = null)
    {
        $data = $data ? $data : \Input::all();

        $validation = Validator::make($data, static::$rules, static::$messages);

        if ($validation->passes()) return true;

        $this->errors = $validation->messages();

        return false;
    }
}

