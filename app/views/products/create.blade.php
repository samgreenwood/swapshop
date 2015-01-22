@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="page-header">
			<h1>
				<i class="fa fa-list-ul"></i>
				Products
				<small>Add New</small>
			</h1>
		</div>
		<div>
			{{Former::open(URL::route('products.store'))->enctype('multipart/form-data')}}
				@include('products._form')
			{{Former::close()}}	
		</div>
	</div>
</div>
@stop
