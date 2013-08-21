@extends('layouts.master')

@section('content')
<h1>Dashboard</h1>
<hr />
<div class="row-fluid">
	<div class="span3">
		<h2>User Signature</h2>
		{{Former::open(URL::action('Swapshop\Controllers\UserController@postDashboard'))}}
		{{Former::populate($user)}}
		{{Former::textarea('signature','')->rows('5')->cols('80')->raw()}}
	</div>
	<div class="span9">
		<h2>Your Listings</h2>
		<table class="table">
			<thead>
				<tr>
					<th>Product</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					@foreach($user['listings'] as $listing)
					<td>{{$listing['product']['name']}}</td>
					<td>{{$listing['quantity']}}</td>
					<td>${{number_format($listing['price'],2)}}</td>
					<td>
					{{Html::LinkAction('Swapshop\Controllers\ListingController@getEdit','Edit' ,$listing['id'], array('class' => 'btn btn-success'))}}
					{{Html::LinkAction('Swapshop\Controllers\ListingController@getDelete','Delete' ,$listing['id'], array('class' => 'btn btn-danger'))}}
					</td>
					@endforeach
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
			{{Former::actions()->primary_submit('Submit')->inverse_reset('Reset')}}
			{{Former::close()}}
	</div>	
</div>

@stop