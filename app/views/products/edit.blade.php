@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="page-header">
			<h1>
				<i class="fa fa-list-ul"></i>
				Products
				<small>Edit</small>
			</h1>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<h2>Details</h2>
		{{Former::open(URL::route('products.update', $product->id))->enctype('multipart/form-data')->method('PUT')}}
		{{Former::populate($product)}}
		@include('products._form')
		{{Former::close()}}
	</div>
	<div class="col-md-4">
		<h2>Images</h2>
		@foreach($product->images as $image)
		<img src="/images/products/{{$product->id}}/{{$image->image}}">
		{{Former::open('')->method('DELETE')}}
		{{Former::submit()->value('Delete')->class('btn btn-danger btn-small')}}
		@endforeach
	</div>
</div>
@stop
