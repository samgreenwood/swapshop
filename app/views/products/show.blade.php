@extends('layouts.master')

@section('content')
	<h1>{{$product->name}}</h1>
	<a class="btn btn-success" href="{{URL::route('products.edit', $product->id)}}">Edit</a>
	<hr>
	<div class="row-fluid">
	
	</div>
    <div class="row-fluid">
        @foreach($product['listings'] as $listing)
            @if($listing['quantity'] > 0)
                <div class="span3">
                	<div class="well" style="text-align: center;">
                		<h4>{{$listing['user']['username']}}</h4>
                		<p>
                		    <a class="btn btn-small" href="mailto:{{$listing->user->email}}">Contact Seller</a>  
                    		<a class="btn btn-small" href="">Purchase</a> 
                		</p>
                		<span class="badge badge-inverse">${{number_format($listing->price, 2)}}</span>
                		<span class="badge badge-info">{{$listing->condition}}</span>
                		<span class="badge badge-success">{{$listing->quantity}}</span>
                	</div>
                </div>
        	@endif
        @endforeach
    </div>
@stop
