@extends('layouts.master')

@section('content')
<h1>Listings for {{$product['name']}}</h1>
<hr />

<div class="row-fluid">
	<div class="span3" style="text-align: center;">
		<img src="http://placehold.it/100x100">
		<img src="http://placehold.it/100x100">
	</div>
	<div class="span9">
		<div class="well">
			{{$product['description']}}
		</div>
	</div>
</div>
<hr />
<div class="row-fluid">
@foreach($product['listings'] as $listing)
<div class="span3">
	<div class="well" style="text-align: center;">
		<h4>{{$listing['user']['username']}}</h4>
		<p><a class="btn btn-small" href="mailto:{{$listing['user']['email']}}">Contact Seller</a>  <a class="btn btn-small" href="#">Purchase</a> </p>
		<span class="badge badge-inverse">${{number_format($listing['price'],2)}}</span>
		<span class="badge badge-info">{{$listing['condition']}}</span>
		<span class="badge badge-success">{{$listing['quantity']}}</span>
		
	</div>	
</div>
@endforeach
</div>
@stop