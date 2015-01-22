@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="page-header">
			<h1>
				<i class="fa fa-shopping-cart"></i>
				Listings
			</h1>
		</div>
		<div>
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
					@if($listings->isEmpty())
					<tr>
						<td colspan="5">Sorry, no listings!</td>
					</tr>
					@endif

					@foreach($listings as $listing)
					<tr>
						<td>{{$listing->product}}</td>
						<td>{{$listing->seller}}</td>
						<td>{{$listing->quantity}}</td>
						<td>{{$listing->price}}</td>
						<td>
							{{link_to_route('listings.edit','Edit',$listing->id,array('class' => 'btn btn-success'))}}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop
