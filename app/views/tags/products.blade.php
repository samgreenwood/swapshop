@extends('layouts.master')

@section('jquery')

@stop

@section('content')
<h1>{{$tag->name}}</h1>
<hr />
		@foreach($tag->products->chunk(4) as $productRow)im gunna
        <div class="row-fluid">
		    @foreach($productRow as $product)
    			@if($product->isSellable())
	    			<div class="span3 well" style="text-align:center; height: 410px;">
		    			@if(count($product->images))

			    		<img style="height: 150px;" src="{{$product->firstImage->path()}}" style="padding-bottom: 5px;">
				    	@else
					    <img src="/images/holder.js/150x150" style="padding-bottom: 5px;">
    					@endif
					
	    				<h2>{{$product->name}}</h2>
		    			<h3>
                        {{$product->availableQuantity()}} available for {{$product->displayPrice()}}
			    		</h3>
				    	<p><a class="btn btn-small btn-primary" href="/listings/{{$product->slug}}">Listings</a></p>
					    <p>{{$product->description}}</p>
    					<p><a href="{{$product->pdf}}">More Information</a></p>
	    			</div>
			    @endif
			@endforeach
			</div>
		@endforeach
@stop
