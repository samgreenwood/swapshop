@extends('layouts.master')

@section('content')
<h1>Products</h1>
<a href="/products/create" class="btn btn-primary">Add Product</a>
<hr>
@if(count($products))
<table class="table dataTable data-table">
	<thead>
		<tr>
			<th>Name</th>
		    <th>Tags</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($products as $product)
		<tr>
			<td>{{$product->name}}</td>
			<td>
			<ul>
			@foreach($product->tags as $tag)
            <li>{{$tag->name}}</li>
			@endforeach
			</ul>
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
@else

<p>Sorry! No products added</p>

@endif

@stop
