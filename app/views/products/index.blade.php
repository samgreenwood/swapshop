@extends('layouts.master')

@section('content')
<h1>Products</h1>
<hr>
@if(count($products))
<table class="table">
	<thead>
		<tr>
			<td>Name</td>
			<td>Information</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
		@foreach($products as $product)
		<tr>
			<td>{{$product['name']}}</td>
			<td>{{$product['pdf']}}</td>
			<td>{{Html::linkAction('Swapshop\Controllers\ProductController@getEdit', 'Edit', $product['id'], array('class' => 'btn btn-success'))}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@else

<p>Sorry! No products added</p>

@endif

{{Html::linkAction('Swapshop\Controllers\ProductController@getCreate','Add Product')}}

@stop