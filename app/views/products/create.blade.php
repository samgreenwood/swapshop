@extends('layouts.master')

@section('jquery')

@stop

@section('content')
	<h1>Create Product</h1>
	<hr>
		{{Former::open(URL::action('Swapshop\Controllers\ProductController@postCreate'))->enctype('multipart/form-data')}}
		@include('products._form')
		{{Former::close()}}	
@stop