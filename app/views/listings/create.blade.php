@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="page-header">
			<h1>
				<i class="fa fa-shopping-cart"></i>
				Listing
				<small>Create</small>
			</h1>
		</div>
		<div>
			{{Former::open(URL::route('listings.store'))}}
			@include('listings._form')
			{{Former::close()}}
		</div>
	</div>
</div>
@stop
