<?php namespace Swapshop\Listing\Forms;

trait ListingForm
{
    /**
     * Validation rules for the listing form
     *
     * @var array
     */
    protected $rules = [
        'product_id' => 'required',
        'quantity' => 'required|numeric|min:0',
        'price' => 'required|numeric|min:0',
        'condition' => 'required',
    ];
}