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
</div>

@stop
