<?php namespace Swapshop\Controllers;

use Swapshop\Listing;
use Swapshop\Purchase;

class PurchaseController extends \BaseController
{
    /**
     * @param $listingID
     * @return mixed
     */
    public function getPurchase($listingID)
    {
        $listing = Listing::find($listingID);

        return \View::make('listings.purchase', compact('listing'));
    }

    /**
     * @param $listingID
     * @return mixed
     */
    public function postPurchase($listingID)
    {
        $purchaseQuantity = \Input::get('quantity');
        $purchaseTotal = \Input::get('total');
        $message = \Input::get('message');
        $listing = Listing::find($listingID);

        // remove purchased quantity from listing
        $listing->quantity = $listing->quantity - $purchaseQuantity;
        $listing->save();

        // prepare purchase data
        $data['listing_id'] = $listingID;
        $date['total'] = $purchaseTotal;
        $data['quantity'] = $purchaseQuantity;
        $data['user_id'] = \Auth::user()->getKey();
        $data['message'] = $message;

        // create purchase in database
        $purchase = new Purchase();
        $purchase->fill($data);
        $purchase->save();

        $sellerEmail = $purchase->listing->user->email;
        $buyerEmail = $purchase->user->email;

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

