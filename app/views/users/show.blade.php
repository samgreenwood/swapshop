@extends('layouts.master')

@section('content')
<h1>My Swapshop</h1>
<div class="row-fluid">
<div class="span6">
<h2>Listings</h2>
<table class='table table-first-column-number data-table display full dataTable'>
	<thead>
		<tr>
			<th style="padding-left: 1em;">#</th>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Operations</th>
		</tr>
	</thead>
	<tbody>
		@foreach(Auth::user()->listings as $listing)
		<tr>
			<td>{{$listing->id}}</td>
			<td>{{$listing->product->name}}</td>
			<td>{{$listing->price}}</td>
			<td>{{$listing->quantity}}</td>
			<td>{{Html::linkRoute('manufacturers.products.listings.edit','Edit',[$listing->product->manufacturer->id, $listing->product->id, $listing->id])}} | Delete</td>
		</tr>
		@endforeach
	</tbody>

</table>
</div>
<div class="span6">
<h2>Purchases</h2>

<table class='table table-first-column-number data-table display full dataTable'>
	<thead>
		<tr>
			<th style="padding-left: 1em;">#</th>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
		@foreach(Auth::user()->purchases as $purchase)
		<tr>
			<td>{{$purchase->id}}</td>
			<td>{{$purchase->listing->product->name}}</td>
			<td>${{number_format($purchase->listing->price,2)}}</td>
			<td>{{$purchase->quantity}}</td>
			<td>${{ number_format($purchase->quantity * $purchase->listing->price,2) }}</td>
			
		</tr>
		@endforeach
	</tbody>

</table>
</div>
</div>
@stop