@extends('layouts.master')

@section('content')
	<h1>Delete Product</h1>
	<div class="well">
		Are you sure you want to delete Product {{$product->name}}?
	</div>
		{{Former::open(URL::route('products.destroy', $product->id))->method('DELETE')}}
		{{Former::submit()->class('btn btn-danger')->value('Delete')}}
		{{Former::close()}}	
@stop
