@extends('layouts.master')

@section('jquery')

@stop

@section('content')
<h1>{{$tag['name']}}</h1>
<hr />
<div class="row-fluid">
		@foreach($tag['products'] as $product)
			@if(count($product['listings']))
				<div class="span3 well" style="text-align:center;">
					<img src="http://placehold.it/300x300" style="padding-bottom: 5px;">
					<h2>{{$product['name']}}</h2>
					<p><a href="{{$product['pdf']}}">Information</a></p>
					<p>{{HTML::LinkAction('ProductController@getListings', 'View Listings', $product['id'],array('class' => 'btn btn-primary'))}}</p>
					<p>{{$product['description']}}</p>
				</div>
			@endif
		@endforeach
		</div>
@stop