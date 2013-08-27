<?php namespace Swapshop\Services\Validators;

use \Validator;
use \Input;

abstract class BaseValidator
{	
	protected $data;

    public $errors;

    public static $rules;

    public static $messages = array();

    public function __construct($data = null)
    {
        $this->data = $data ?: Input::all();
    }

    public function passes()
    {
        $validation = Validator::make($this->data, static::$rules, static::$messages);

        if ($validation->passes()) return true;

        $this->errors = $validation->messages();

        return false;
    }
}

