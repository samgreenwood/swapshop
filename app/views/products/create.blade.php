@extends('layouts.master')

@section('content')
	<h1>Create Product</h1>
	<hr>
		{{Former::open(URL::route('products.store'))->enctype('multipart/form-data')}}
		@include('products._form')
		{{Former::close()}}	
@stop
