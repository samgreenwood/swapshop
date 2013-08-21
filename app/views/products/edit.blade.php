@extends('layouts.master')

@section('content')
<div class="row-fluid">
	<div class="span6">
		<h1>Edit Product</h1>
		{{Former::open(URL::action('Swapshop\Controllers\ProductController@postEdit', $product['id']))}}
		{{Former::populate($product)}}
		@include('products._form')
		{{Former::close()}}
</div>

@stop