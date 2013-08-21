@extends('layouts.master')

@section('content')
<h1>Tags</h1>
{{Html::linkAction('Swapshop\Controllers\TagController@getCreate','Add Tag')}}
<hr>
@if(count($tags))
<table class="table datatable">
	<thead>
		<tr>
			<th>Name</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($tags as $tag)
		<tr>
			<td>{{$tag['name']}}</td>
			<td><a class="btn btn-success" href="/tags/edit/{{$tag['id']}}">Edit</a>
			<a class="btn btn-danger" href="/tags/delete/{{$tag['id']}}">Delete</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
@else

<p>Sorry! No tags added</p>

@endif



@stop