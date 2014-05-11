@extends('layouts.master')

@section('content')
<h1>Tags</h1>
<a href="/tags/create" class="btn btn-primary">Add Tag</a>
<hr>
@if(count($tags))
<table class="table">
	<thead>
		<tr>
			<th>Name</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($tags as $tag)
		<tr>
			<td>{{$tag->name}}</td>
			<td><a class="btn btn-success" href="/tags/{{$tag->id}}/edit">Edit</a>
			<a class="btn btn-danger" href="/tags/{{$tag->id}}/delete">Delete</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
@else

<p>Sorry! No tags added</p>

@endif



@stop
