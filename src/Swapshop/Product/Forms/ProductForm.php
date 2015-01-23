<?php namespace Swapshop\Product\Forms;

trait ProductForm
{
    /**
     * Validation rules for Products
     *
     * @var array
     */
    protected $rules = [
        'name'  => 'required',
        'pdf'   => 'required',
        'description'   => 'required'
    ];
}