@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="page-header">
			<h1>
				<i class="fa fa-shopping-cart"></i>
				Listing
				<small>Edit</small>
			</h1>
		</div>
		<div>
			{{Former::open(URL::route('listings.update', $listing->id))->method('PUT')}}
			{{Former::populate($listing)}}
			@include('listings._form')
			{{Former::close()}}
		</div>
	</div>
</div>
@stop
