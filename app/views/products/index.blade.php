@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="page-header">
			<h1>
				<i class="fa fa-list-ul"></i>
				Products
			</h1>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<a href="/products/create" class="btn btn-primary pull-right">Add Product</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table dataTable data-table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Tags</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@if(!count($products))
					<tr>
						<td colspan="3">Sorry, no products!</td>
					</tr>
				@endif
				@foreach($products as $product)
				<tr>
					<td>{{$product->name}}</td>
					<td>
						@foreach($product->tags as $tag)
							<span class="label label-default">{{$tag->name}}</span>
						@endforeach
					</td>
					<td>
						<a class="btn btn-success" href="/products/{{$product->id}}/edit">Edit</a>
						<a class="btn btn-danger" href="/products/{{$product->id}}/delete">Delete</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{$products->links()}}
	</div>
</div>
@stop
