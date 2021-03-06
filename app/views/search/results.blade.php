@extends('layouts.master')

@section('content')
<h1>Search Results</h1>
<hr>
@foreach($results as $product)
	@if(count($product['listings']))
		<div class="span3 well" style="text-align:center;">
			@if(count($product['images']))
			<img src="/images/products/{{$product['id']}}/{{$product['images'][0]['image']}}" style="padding-bottom: 5px;">
			@else
			<img src="http://placehold.it/300x300" style="padding-bottom: 5px;">
			@endif
			
			<h2>{{$product['name']}}</h2>
			<p><a href="{{$product['pdf']}}">Information</a></p>
			<p>{{HTML::LinkAction('Swapshop\Controllers\ProductController@getListings', 'View Listings', $product['id'],array('class' => 'btn btn-primary'))}}</p>
			<p>{{$product['description']}}</p>
		</div>
	@endif
@endforeach
@stop