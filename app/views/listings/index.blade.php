@extends('layouts.master')

@section('content')
<h1>Listings</h1>
<hr>
@if(!$listings->isEmpty())
<table class="table">
	<thead>
		<tr>
			<th>Product</th>
			<th>Seller</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($listings as $listing)
		<tr>
			<td>{{$listing->product}}</td>
			<td>{{$listing->seller}}</td>
			<td>{{$listing->quantity}}</td>
			<td>{{$listing->price}}</td>
			<td>
			{{Former::inline_open(URL::route('listings.destroy', $listing->id))->method('DELETE')}}
			{{link_to_route('listings.edit','Edit',$listing->id,array('class' => 'btn btn-success'))}}
			</td>
			</tr>
		@endforeach
	</tbody>
</table>
@else
Sorry, no listings added.
@endif
@stop