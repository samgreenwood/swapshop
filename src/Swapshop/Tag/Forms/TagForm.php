<?php namespace Swapshop\Tag\Forms;

trait TagForm
{
    /**
     * Validation rules for Tag
     *
     * @var array
     */
    protected $rules = [
        'name' => 'required',
    ];

}