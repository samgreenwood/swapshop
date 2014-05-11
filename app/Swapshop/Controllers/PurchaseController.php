<?php namespace Swapshop\Controllers;

use Swapshop\Listing;
use Swapshop\Purchase;

class PurchaseController extends \BaseController
{
    protected $purchase;

    protected $listing;

    public function __construct(Purchase $purchase, Listing $listing)
    {   
        $this->purchase = $purchase;
        $this->listing = $listing;
    }

    public function getPurchase($listingID)
    {
        $listing = $this->listing->find($listingID);

        return \View::make('listings.purchase', compact('listing'));
    }

    public function postPurchase($listingID)
    {
        $purchaseQuantity = \Input::get('quantity');
        $purchaseTotal = \Input::get('total');
        $message = \Input::get('message');
        $listing = $this->listing->find($listingID);

        // remove purchased quantity from listing
        $listing->quantity = $listing->quantity - $purchaseQuantity;
        $listing->save();

        // prepare purchase data
        $data['listing_id'] = $listingID;
        $date['total'] = $purchaseTotal;
        $data['quantity'] = $purchaseQuantity;
        $data['user_id'] = \Auth::user();
        $data['message'] = $message;

        // create purchase in database
        $purchase = $this->purchase->newInstance();
        $purchase->fill($data);
        $purchase->save();

        $sellerEmail = $purchase->listing->user->email;
        $buyerEmail = $purchase->user->email;

        // send email
        \Mail::send('emails.purchase', compact('purchase'), function($message) use ($sellerEmail, $buyerEmail) {
                $message->from($buyerEmail);
                $message->to($sellerEmail)->subject('Swapshop Sale');
        });

        \Mail::send('emails.purchaseconfirm', compact('purchase'), function($message) use ($sellerEmail, $buyerEmail)
        {
            $message->from('swapshop@air-stream.org');
            $message->to($buyerEmail)->subject('Swapshop Sale Confirmation');
        });

        return \View::make('purchases.success', compact('purchase'));


    }

}

