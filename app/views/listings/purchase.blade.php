@extends('layouts.master')
@section('jquery')

$('#quantity').change(function()
{
	price = $('#price').val();
	total = price * $(this).val();
	
	$('#total').val(total.toFixed(2));
});

@stop
@section('content')

<h1>Purchase {{$listing['product']['name']}}</h1>
@if($listing['seller']['signature'])
<div class="well">
	<strong>Seller notes:</strong> {{$listing['seller']['signature']}}
</div>
@endif
<hr>
{{Former::open(URL::action('Swapshop\Controllers\ListingController@postPurchase', $listing['id']))}}
{{Former::text('','Seller')->value($listing['seller']['username'])->readonly()}}
{{Former::small_number('quantity')->min(1)->max($listing['quantity'])->value(1)}}
{{Former::small_text('price','Price Each')->value($listing['price'])->readonly()->prepend('$')}}
{{Former::small_text('total','Total')->readonly()->value($listing['price'])->prepend('$')}}
{{Former::textarea('message','Message')->help('Any additional information you would like toe leave for the seller')}}
{{Former::actions()->primary_submit('Submit')->inverse_reset('Reset')}}
{{Former::close()}}

@stop