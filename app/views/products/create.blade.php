@extends('layouts.master')

@section('jquery')

@stop

@section('content')
	<h1>Create Product</h1>
	<hr>
		{{Former::open(URL::action('ProductController@postCreate'))->enctype('multipart/form-data')}}
		@include('products._form')
		{{Former::close()}}	
@stop