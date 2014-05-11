@extends('layouts.master')

@section('content')
<div class="row-fluid">
	<div class="span6">
		<h1>Edit Product</h1>
		{{Former::open(URL::route('products.update', $product->id))->enctype('multipart/form-data')->method('PUT')}}
		{{Former::populate($product)}}
		@include('products._form')
		{{Former::close()}}
	</div>
	<div class="span6">
	<h1>Images</h1>
		@foreach($product->images as $image)
		<img src="/images/products/{{$product->id}}/{{$image->image}}">
		{{Former::open('')->method('DELETE')}}
		{{Former::submit()->value('Delete')->class('btn btn-danger btn-small')}}
		@endforeach
	</div>
</div>

@stop
