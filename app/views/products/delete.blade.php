@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="page-header">
			<h1>
				<i class="fa fa-list-ul"></i>
				Products
				<small>Delete</small>
			</h1>
		</div>
		<div class="alert alert-warning" role="alert">
			<p>
				<i class="fa fa-exclamation-triangle"></i>
				<b>Whoa, nelly!</b>
			</p>
			<p>
				Are you sure you want to delete the product <b>{{$product->name}}</b>? Doing so will destroy it for ever!
			</p>
		</div>
		<div>
			{{Former::open(URL::route('products.destroy', $product->id))->method('DELETE')}}
			{{Former::submit()->class('btn btn-danger')->value('Delete')}}
			{{Former::close()}}	
		</div>
	</div>
</div>
@stop
