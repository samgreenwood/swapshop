@extends('layouts.master')

@section('dashboard-listings')
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
@stop

@section('dashboard-sales')
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
@stop

@section('dashboard-purchases')
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
@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<h1>My Swapshop</h1>
		<hr />
		<div role="tabpanel">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#listings" aria-controls="listings" role="tab" data-toggle="tab">Listings</a></li>
				<li role="presentation"><a href="#sales" aria-controls="sales" role="tab" data-toggle="tab">Sales</a></li>
				<li role="presentation"><a href="#purchases" aria-controls="purchases" role="tab" data-toggle="tab">Purchases</a></li>
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="listings">
					@yield('dashboard-listings')
				</div>
				<div role="tabpanel" class="tab-pane" id="sales">
					@yield('dashboard-sales')
				</div>
				<div role="tabpanel" class="tab-pane" id="purchases">
					@yield('dashboard-purchases')
				</div>
			</div>
		</div>
	</div>
</div>
@stop
