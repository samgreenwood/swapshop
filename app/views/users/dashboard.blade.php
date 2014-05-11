@extends('layouts.master')

@section('content')
<h1>My Swapshop</h1>
<hr />
<div class="row-fluid">
	<div class="span12">
	    <h2>Listings</h2>
		<table class="table">
			<thead>
				<tr>
					<th>Product</th>
					<th>Quantity</th>
					<th>Condition</th>
					<th>Price</th>
					<th>Active</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					@foreach($user->listings as $listing)
					<td>{{$listing->product->name}}</td>
					<td>{{$listing->quantity}}</td>
					<td>{{$listing->condition}}</td>
					<td>${{number_format($listing->price,2)}}</td>
					<td>{{$listing->active ? '<i class="icon-ok"></i>' : ''}}</td>
					<td>
	    				<a href="#" class="btn btn-primary"><i class="icon-edit">Edit</i></a>
	    				@if($listing->active)
    					<a href="#" class="btn btn-success"><i class="icon-check">Enable</i></a>
    					@else
    					<a href="#" class="btn btn-danger"><i class="icon-check">Disable</i></a>
    					@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<div class="row-fluid">
    <div class="span6">
    <h2>Sales</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Buyer</th>
                <th>Payment Sent</th>
                <th>Payment Recieved</th>
            </tr>
        </thead>
        <tbody>
        @foreach($user->sales as $sale)
        <tr>
           <td>{{$sale->created_at}}</td> 
           <td>{{$sale->listing->product}}</td> 
           <td>{{$sale->quantity}}</td> 
           <td>{{$sale->amount}}</td>
           <td>{{$sale->buyer}}</td> 
           <td>{{$sale->payment_sent}}</td> 
           <td>{{$sale->payment_recieved}}</td> 
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <div class="span6">
    <h2>Purchases</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Buyer</th>
                <th>Payment Sent</th>
                <th>Payment Recieved</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
 
    </div>
</div>
@stop
